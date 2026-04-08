<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Core\Checkout\Payment\PaymentHandler;

use ActionTarget\PaymentGate\Service\PaymentGate\PaymentGateClient;
use ActionTarget\PaymentGate\Service\Transaction\TransactionService;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionStateHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\AbstractPaymentHandler;
use Shopware\Core\Checkout\Payment\PaymentException;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Net 30 Payment Handler (Shopware 6.7+)
 * 
 * Handles Net 30 payment terms for approved B2B customers
 * Payment is authorized immediately but captured later
 */
class Net30Handler extends AbstractPaymentHandler
{
    private PaymentGateClient $paymentGateClient;
    private TransactionService $transactionService;
    private OrderTransactionStateHandler $transactionStateHandler;
    private EntityRepository $orderRepository;
    private EntityRepository $orderTransactionRepository;

    public function __construct(
        PaymentGateClient $paymentGateClient,
        TransactionService $transactionService,
        OrderTransactionStateHandler $transactionStateHandler,
        EntityRepository $orderRepository,
        EntityRepository $orderTransactionRepository
    ) {
        $this->paymentGateClient = $paymentGateClient;
        $this->transactionService = $transactionService;
        $this->transactionStateHandler = $transactionStateHandler;
        $this->orderRepository = $orderRepository;
        $this->orderTransactionRepository = $orderTransactionRepository;
    }

    /**
     * Process Net 30 payment - unified flow for Shopware 6.7+
     * Returns null as Net 30 doesn't require redirect
     */
    public function pay(
        string $orderTransactionId,
        Request $request,
        Context $context
    ): ?RedirectResponse {
        try {
            // Fetch order transaction and order
            $orderTransaction = $this->getOrderTransaction($orderTransactionId, $context);
            $order = $this->getOrder($orderTransaction->getOrderId(), $context);
            $customer = $order->getOrderCustomer();

            // Verify customer is eligible for Net 30
            if (!$this->isEligibleForNet30($customer->getCustomerId(), $context)) {
                throw PaymentException::syncProcessInterrupted(
                    $orderTransactionId,
                    'Customer is not eligible for Net 30 payment terms'
                );
            }

            // Prepare payment data
            $paymentData = [
                'amount' => $order->getAmountTotal(),
                'currency' => $order->getCurrency()->getIsoCode(),
                'order_id' => $order->getOrderNumber(),
                'customer_id' => $customer->getCustomerId(),
                'description' => 'Net 30 - Order ' . $order->getOrderNumber(),
                'payment_method' => 'net30',
                'payment_terms' => 30,
                'due_date' => date('Y-m-d', strtotime('+30 days')),
                'metadata' => [
                    'order_id' => $order->getId(),
                    'transaction_id' => $orderTransactionId,
                    'customer_number' => $customer->getCustomerNumber(),
                ],
            ];

            // Authorize Net 30 payment
            $response = $this->paymentGateClient->authorize($paymentData);

            if (!$response['success']) {
                throw PaymentException::syncProcessInterrupted(
                    $orderTransactionId,
                    $response['error_message'] ?? 'Net 30 authorization failed'
                );
            }

            // Log transaction
            $this->transactionService->logTransaction([
                'order_transaction_id' => $orderTransactionId,
                'gateway_transaction_id' => $response['transaction_id'],
                'type' => 'authorize',
                'status' => 'authorized',
                'amount' => $order->getAmountTotal(),
                'currency' => $order->getCurrency()->getIsoCode(),
                'payment_method' => 'net30',
                'due_date' => $paymentData['due_date'],
                'request_data' => json_encode($paymentData),
                'response_data' => json_encode($response),
            ]);

            // Mark transaction as authorized (not paid yet - will be paid in 30 days)
            $this->transactionStateHandler->authorize($orderTransactionId, $context);

            // No redirect needed for Net 30
            return null;

        } catch (\Exception $e) {
            throw PaymentException::syncProcessInterrupted(
                $orderTransactionId,
                'Net 30 payment failed: ' . $e->getMessage()
            );
        }
    }

    /**
     * Finalize is not needed for synchronous Net 30 payments
     */
    public function finalize(
        string $orderTransactionId,
        Request $request,
        Context $context
    ): void {
        // Not needed for synchronous payment
    }

    /**
     * Indicate support for refunds
     */
    public function supports(): array
    {
        return [
            'refund' => true,
            'recurring' => false,
        ];
    }

    /**
     * Check if customer is eligible for Net 30 terms
     */
    private function isEligibleForNet30(string $customerId, Context $context): bool
    {
        // TODO: Implement actual eligibility check
        // This should check:
        // - Customer credit limit
        // - Payment history
        // - Account standing
        // - Credit approval status
        
        // For now, return true for testing
        return true;
    }

    /**
     * Get order transaction
     */
    private function getOrderTransaction(string $orderTransactionId, Context $context)
    {
        $criteria = new \Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria([$orderTransactionId]);
        $criteria->addAssociation('order');
        
        $transaction = $this->orderTransactionRepository->search($criteria, $context)->first();
        
        if (!$transaction) {
            throw PaymentException::unknownPaymentMethod($orderTransactionId);
        }
        
        return $transaction;
    }

    /**
     * Get order
     */
    private function getOrder(string $orderId, Context $context)
    {
        $criteria = new \Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria([$orderId]);
        $criteria->addAssociation('currency');
        $criteria->addAssociation('orderCustomer');
        
        $order = $this->orderRepository->search($criteria, $context)->first();
        
        if (!$order) {
            throw new \RuntimeException('Order not found');
        }
        
        return $order;
    }
}

// @Author Moustafa M S