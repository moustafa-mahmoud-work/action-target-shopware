<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Core\Checkout\Payment\PaymentHandler;

use ActionTarget\PaymentGate\Service\PaymentGate\PaymentGateClient;
use ActionTarget\PaymentGate\Service\Transaction\TransactionService;
use Shopware\Core\Checkout\Order\Aggregate\OrderTransaction\OrderTransactionStateHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\AbstractPaymentHandler;
use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\PaymentHandlerException;
use Shopware\Core\Checkout\Payment\PaymentException;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Credit Card Payment Handler (Shopware 6.7+)
 * 
 * Handles credit card payments via PaymentGate API
 * Supports authorization-first workflow with async redirect
 */
class CreditCardHandler extends AbstractPaymentHandler
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
     * Process payment - unified flow for Shopware 6.7+
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

            // Prepare payment data
            $paymentData = [
                'amount' => $order->getAmountTotal(),
                'currency' => $order->getCurrency()->getIsoCode(),
                'order_id' => $order->getOrderNumber(),
                'customer_id' => $order->getOrderCustomer()->getCustomerId(),
                'description' => 'Order ' . $order->getOrderNumber(),
                'payment_method' => 'credit_card',
                'card_token' => $request->request->get('cardToken'),
                'save_card' => $request->request->getBoolean('saveCard', false),
                'metadata' => [
                    'order_id' => $order->getId(),
                    'transaction_id' => $orderTransactionId,
                ],
            ];

            // Authorize payment
            $response = $this->paymentGateClient->authorize($paymentData);

            if (!$response['success']) {
                throw PaymentException::asyncProcessInterrupted(
                    $orderTransactionId,
                    $response['error_message'] ?? 'Payment authorization failed'
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
                'request_data' => json_encode($paymentData),
                'response_data' => json_encode($response),
            ]);

            // Mark as in progress
            $this->transactionStateHandler->process($orderTransactionId, $context);

            // Return redirect if needed (e.g., for 3D Secure)
            if (isset($response['redirect_url'])) {
                return new RedirectResponse($response['redirect_url']);
            }

            // No redirect needed - payment processed
            return null;

        } catch (\Exception $e) {
            throw PaymentException::asyncProcessInterrupted(
                $orderTransactionId,
                'Credit card payment failed: ' . $e->getMessage()
            );
        }
    }

    /**
     * Finalize payment after customer returns from redirect
     */
    public function finalize(
        string $orderTransactionId,
        Request $request,
        Context $context
    ): void {
        // Check if payment was canceled
        if ($request->query->getBoolean('cancel')) {
            throw PaymentException::customerCanceled(
                $orderTransactionId,
                'Customer canceled the payment'
            );
        }

        // Verify payment status
        $transactionId = $request->query->get('transaction_id');
        if (!$transactionId) {
            throw PaymentException::asyncFinalizeInterrupted(
                $orderTransactionId,
                'Missing transaction ID'
            );
        }

        try {
            $status = $this->paymentGateClient->getPaymentStatus($transactionId);

            if ($status['status'] !== 'authorized') {
                throw PaymentException::asyncFinalizeInterrupted(
                    $orderTransactionId,
                    'Payment not authorized: ' . ($status['error_message'] ?? 'Unknown error')
                );
            }

            // Update transaction log
            $this->transactionService->updateTransactionStatus(
                $transactionId,
                'authorized',
                $status
            );

            // Mark transaction as paid
            $this->transactionStateHandler->paid($orderTransactionId, $context);

        } catch (\Exception $e) {
            throw PaymentException::asyncFinalizeInterrupted(
                $orderTransactionId,
                'Payment verification failed: ' . $e->getMessage()
            );
        }
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