<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Service\Transaction;

use Psr\Log\LoggerInterface;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\Uuid\Uuid;

/**
 * Transaction Service
 * 
 * Manages payment transaction records and status updates
 */
class TransactionService
{
    private EntityRepository $transactionRepository;
    private LoggerInterface $logger;

    public function __construct(
        EntityRepository $transactionRepository,
        LoggerInterface $logger
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->logger = $logger;
    }

    /**
     * Log a new transaction
     */
    public function logTransaction(array $transactionData, ?Context $context = null): string
    {
        $context = $context ?? Context::createDefaultContext();
        
        $transactionId = Uuid::randomHex();
        
        $data = [
            'id' => $transactionId,
            'orderTransactionId' => $transactionData['order_transaction_id'],
            'gatewayTransactionId' => $transactionData['gateway_transaction_id'] ?? null,
            'type' => $transactionData['type'],
            'status' => $transactionData['status'],
            'amount' => $transactionData['amount'],
            'currency' => $transactionData['currency'],
            'paymentMethod' => $transactionData['payment_method'] ?? 'credit_card',
            'requestData' => $transactionData['request_data'] ?? null,
            'responseData' => $transactionData['response_data'] ?? null,
            'errorMessage' => $transactionData['error_message'] ?? null,
            'dueDate' => $transactionData['due_date'] ?? null,
            'createdAt' => new \DateTime(),
        ];

        try {
            $this->transactionRepository->create([$data], $context);
            
            $this->logger->info('Transaction logged', [
                'transaction_id' => $transactionId,
                'type' => $data['type'],
                'status' => $data['status'],
            ]);

            return $transactionId;
        } catch (\Exception $e) {
            $this->logger->error('Failed to log transaction', [
                'error' => $e->getMessage(),
                'data' => $transactionData,
            ]);
            
            throw $e;
        }
    }

    /**
     * Update transaction status
     */
    public function updateTransactionStatus(
        string $gatewayTransactionId,
        string $status,
        array $responseData = [],
        ?Context $context = null
    ): void {
        $context = $context ?? Context::createDefaultContext();

        try {
            // Find transaction by gateway transaction ID
            $transaction = $this->findByGatewayTransactionId($gatewayTransactionId, $context);
            
            if (!$transaction) {
                $this->logger->warning('Transaction not found for status update', [
                    'gateway_transaction_id' => $gatewayTransactionId,
                ]);
                return;
            }

            $updateData = [
                'id' => $transaction['id'],
                'status' => $status,
                'responseData' => json_encode($responseData),
                'updatedAt' => new \DateTime(),
            ];

            $this->transactionRepository->update([$updateData], $context);

            $this->logger->info('Transaction status updated', [
                'transaction_id' => $transaction['id'],
                'gateway_transaction_id' => $gatewayTransactionId,
                'status' => $status,
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Failed to update transaction status', [
                'gateway_transaction_id' => $gatewayTransactionId,
                'error' => $e->getMessage(),
            ]);
            
            throw $e;
        }
    }

    /**
     * Find transaction by gateway transaction ID
     */
    public function findByGatewayTransactionId(string $gatewayTransactionId, Context $context): ?array
    {
        // TODO: Implement actual repository search
        // This is a placeholder that would use the repository to find the transaction
        
        $this->logger->debug('Finding transaction by gateway ID', [
            'gateway_transaction_id' => $gatewayTransactionId,
        ]);

        // For now, return null - will be implemented when repository is set up
        return null;
    }

    /**
     * Find transaction by order transaction ID
     */
    public function findByOrderTransactionId(string $orderTransactionId, Context $context): ?array
    {
        // TODO: Implement actual repository search
        
        $this->logger->debug('Finding transaction by order transaction ID', [
            'order_transaction_id' => $orderTransactionId,
        ]);

        return null;
    }

    /**
     * Get transaction history for an order
     */
    public function getTransactionHistory(string $orderTransactionId, Context $context): array
    {
        // TODO: Implement actual repository search to get all transactions for an order
        
        $this->logger->debug('Getting transaction history', [
            'order_transaction_id' => $orderTransactionId,
        ]);

        return [];
    }

    /**
     * Log capture transaction
     */
    public function logCapture(
        string $orderTransactionId,
        string $gatewayTransactionId,
        float $amount,
        string $currency,
        array $responseData
    ): string {
        return $this->logTransaction([
            'order_transaction_id' => $orderTransactionId,
            'gateway_transaction_id' => $gatewayTransactionId,
            'type' => 'capture',
            'status' => $responseData['success'] ? 'captured' : 'failed',
            'amount' => $amount,
            'currency' => $currency,
            'response_data' => json_encode($responseData),
            'error_message' => $responseData['error_message'] ?? null,
        ]);
    }

    /**
     * Log refund transaction
     */
    public function logRefund(
        string $orderTransactionId,
        string $gatewayTransactionId,
        float $amount,
        string $currency,
        array $responseData,
        ?string $reason = null
    ): string {
        return $this->logTransaction([
            'order_transaction_id' => $orderTransactionId,
            'gateway_transaction_id' => $gatewayTransactionId,
            'type' => 'refund',
            'status' => $responseData['success'] ? 'refunded' : 'failed',
            'amount' => $amount,
            'currency' => $currency,
            'response_data' => json_encode($responseData),
            'error_message' => $responseData['error_message'] ?? $reason,
        ]);
    }

    /**
     * Log void transaction
     */
    public function logVoid(
        string $orderTransactionId,
        string $gatewayTransactionId,
        array $responseData
    ): string {
        return $this->logTransaction([
            'order_transaction_id' => $orderTransactionId,
            'gateway_transaction_id' => $gatewayTransactionId,
            'type' => 'void',
            'status' => $responseData['success'] ? 'voided' : 'failed',
            'amount' => 0,
            'currency' => 'USD',
            'response_data' => json_encode($responseData),
            'error_message' => $responseData['error_message'] ?? null,
        ]);
    }
}

// @Author Moustafa M S