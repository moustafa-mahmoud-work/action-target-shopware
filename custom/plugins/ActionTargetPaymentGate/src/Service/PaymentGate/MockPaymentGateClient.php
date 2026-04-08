<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Service\PaymentGate;

use Psr\Log\LoggerInterface;
use Shopware\Core\System\SystemConfig\SystemConfigService;

/**
 * Mock PaymentGate Client for Testing
 * 
 * Simulates PaymentGate API responses for testing scenarios:
 * - Success responses
 * - Failure responses
 * - Retry scenarios
 * - Network errors
 */
class MockPaymentGateClient extends PaymentGateClient
{
    private const MAX_RETRY_ATTEMPTS = 3;
    private const CAPTURE_RETRY_ATTEMPTS = 2;
    
    private string $mockMode = 'success';
    private int $retryCount = 0;
    private array $mockResponses = [];

    public function __construct(
        SystemConfigService $systemConfigService,
        LoggerInterface $logger
    ) {
        parent::__construct($systemConfigService, $logger);
    }

    /**
     * Set mock mode for testing
     * 
     * @param string $mode Options: 'success', 'failure', 'retry', 'network_error', 'timeout'
     */
    public function setMockMode(string $mode): void
    {
        $this->mockMode = $mode;
        $this->retryCount = 0;
    }

    /**
     * Set custom mock response
     */
    public function setMockResponse(string $method, array $response): void
    {
        $this->mockResponses[$method] = $response;
    }

    /**
     * Mock authorize payment
     */
    public function authorize(array $paymentData): array
    {
        if (isset($this->mockResponses['authorize'])) {
            return $this->mockResponses['authorize'];
        }

        switch ($this->mockMode) {
            case 'success':
                return $this->mockSuccessfulAuthorization($paymentData);
            
            case 'failure':
                return $this->mockFailedAuthorization($paymentData);
            
            case 'retry':
                return $this->mockRetryAuthorization($paymentData);
            
            case 'network_error':
                throw new \RuntimeException('Network connection failed');
            
            case 'timeout':
                throw new \RuntimeException('Request timeout');
            
            default:
                return $this->mockSuccessfulAuthorization($paymentData);
        }
    }

    /**
     * Mock capture payment
     */
    public function capture(string $transactionId, float $amount): array
    {
        if (isset($this->mockResponses['capture'])) {
            return $this->mockResponses['capture'];
        }

        switch ($this->mockMode) {
            case 'success':
                return $this->mockSuccessfulCapture($transactionId, $amount);
            
            case 'failure':
                return $this->mockFailedCapture($transactionId, $amount);
            
            case 'retry':
                return $this->mockRetryCapture($transactionId, $amount);
            
            default:
                return $this->mockSuccessfulCapture($transactionId, $amount);
        }
    }

    /**
     * Mock refund payment
     */
    public function refund(string $transactionId, float $amount, ?string $reason = null): array
    {
        if (isset($this->mockResponses['refund'])) {
            return $this->mockResponses['refund'];
        }

        switch ($this->mockMode) {
            case 'success':
                return $this->mockSuccessfulRefund($transactionId, $amount, $reason);
            
            case 'failure':
                return $this->mockFailedRefund($transactionId, $amount);
            
            default:
                return $this->mockSuccessfulRefund($transactionId, $amount, $reason);
        }
    }

    /**
     * Mock void payment
     */
    public function void(string $transactionId): array
    {
        if (isset($this->mockResponses['void'])) {
            return $this->mockResponses['void'];
        }

        switch ($this->mockMode) {
            case 'success':
                return [
                    'success' => true,
                    'transaction_id' => $transactionId,
                    'status' => 'voided',
                    'message' => 'Payment voided successfully',
                    'timestamp' => date('c'),
                ];
            
            case 'failure':
                return [
                    'success' => false,
                    'transaction_id' => $transactionId,
                    'error_code' => 'VOID_FAILED',
                    'error_message' => 'Cannot void captured payment',
                    'timestamp' => date('c'),
                ];
            
            default:
                return [
                    'success' => true,
                    'transaction_id' => $transactionId,
                    'status' => 'voided',
                    'timestamp' => date('c'),
                ];
        }
    }

    /**
     * Mock get payment status
     */
    public function getPaymentStatus(string $transactionId): array
    {
        if (isset($this->mockResponses['getPaymentStatus'])) {
            return $this->mockResponses['getPaymentStatus'];
        }

        return [
            'success' => true,
            'transaction_id' => $transactionId,
            'status' => 'authorized',
            'amount' => 100.00,
            'currency' => 'USD',
            'authorized_amount' => 100.00,
            'captured_amount' => 0.00,
            'refunded_amount' => 0.00,
            'created_at' => date('c', strtotime('-1 hour')),
            'updated_at' => date('c'),
        ];
    }

    /**
     * Mock save payment method
     */
    public function savePaymentMethod(array $paymentMethodData): array
    {
        if (isset($this->mockResponses['savePaymentMethod'])) {
            return $this->mockResponses['savePaymentMethod'];
        }

        switch ($this->mockMode) {
            case 'success':
                return [
                    'success' => true,
                    'payment_method_id' => 'pm_' . bin2hex(random_bytes(16)),
                    'type' => $paymentMethodData['type'] ?? 'card',
                    'last4' => $paymentMethodData['last4'] ?? '4242',
                    'brand' => $paymentMethodData['brand'] ?? 'visa',
                    'exp_month' => $paymentMethodData['exp_month'] ?? 12,
                    'exp_year' => $paymentMethodData['exp_year'] ?? 2025,
                    'created_at' => date('c'),
                ];
            
            case 'failure':
                return [
                    'success' => false,
                    'error_code' => 'INVALID_CARD',
                    'error_message' => 'Invalid card number',
                ];
            
            default:
                return [
                    'success' => true,
                    'payment_method_id' => 'pm_' . bin2hex(random_bytes(16)),
                ];
        }
    }

    /**
     * Mock delete payment method
     */
    public function deletePaymentMethod(string $paymentMethodId): array
    {
        return [
            'success' => true,
            'payment_method_id' => $paymentMethodId,
            'message' => 'Payment method deleted successfully',
        ];
    }

    // Private helper methods for mock responses

    private function mockSuccessfulAuthorization(array $paymentData): array
    {
        return [
            'success' => true,
            'transaction_id' => 'txn_' . bin2hex(random_bytes(16)),
            'status' => 'authorized',
            'amount' => $paymentData['amount'] ?? 100.00,
            'currency' => $paymentData['currency'] ?? 'USD',
            'authorization_code' => 'AUTH' . rand(100000, 999999),
            'message' => 'Payment authorized successfully',
            'timestamp' => date('c'),
            'expires_at' => date('c', strtotime('+7 days')),
        ];
    }

    private function mockFailedAuthorization(array $paymentData): array
    {
        return [
            'success' => false,
            'status' => 'failed',
            'error_code' => 'INSUFFICIENT_FUNDS',
            'error_message' => 'Insufficient funds in account',
            'amount' => $paymentData['amount'] ?? 100.00,
            'currency' => $paymentData['currency'] ?? 'USD',
            'timestamp' => date('c'),
        ];
    }

    private function mockRetryAuthorization(array $paymentData): array
    {
        $this->retryCount++;

        // Fail first attempts, succeed on final attempt
        if ($this->retryCount < self::MAX_RETRY_ATTEMPTS) {
            return [
                'success' => false,
                'status' => 'retry',
                'error_code' => 'TEMPORARY_ERROR',
                'error_message' => 'Temporary processing error, please retry',
                'retry_after' => 2,
                'attempt' => $this->retryCount,
                'timestamp' => date('c'),
            ];
        }

        return $this->mockSuccessfulAuthorization($paymentData);
    }

    private function mockSuccessfulCapture(string $transactionId, float $amount): array
    {
        return [
            'success' => true,
            'transaction_id' => $transactionId,
            'capture_id' => 'cap_' . bin2hex(random_bytes(16)),
            'status' => 'captured',
            'amount' => $amount,
            'currency' => 'USD',
            'message' => 'Payment captured successfully',
            'timestamp' => date('c'),
        ];
    }

    private function mockFailedCapture(string $transactionId, float $amount): array
    {
        return [
            'success' => false,
            'transaction_id' => $transactionId,
            'status' => 'failed',
            'error_code' => 'AUTHORIZATION_EXPIRED',
            'error_message' => 'Authorization has expired',
            'amount' => $amount,
            'timestamp' => date('c'),
        ];
    }

    private function mockRetryCapture(string $transactionId, float $amount): array
    {
        $this->retryCount++;

        if ($this->retryCount < self::CAPTURE_RETRY_ATTEMPTS) {
            return [
                'success' => false,
                'transaction_id' => $transactionId,
                'status' => 'retry',
                'error_code' => 'PROCESSING_ERROR',
                'error_message' => 'Temporary processing error',
                'retry_after' => 3,
                'attempt' => $this->retryCount,
                'timestamp' => date('c'),
            ];
        }

        return $this->mockSuccessfulCapture($transactionId, $amount);
    }

    private function mockSuccessfulRefund(string $transactionId, float $amount, ?string $reason): array
    {
        return [
            'success' => true,
            'transaction_id' => $transactionId,
            'refund_id' => 'ref_' . bin2hex(random_bytes(16)),
            'status' => 'refunded',
            'amount' => $amount,
            'currency' => 'USD',
            'reason' => $reason,
            'message' => 'Refund processed successfully',
            'timestamp' => date('c'),
        ];
    }

    private function mockFailedRefund(string $transactionId, float $amount): array
    {
        return [
            'success' => false,
            'transaction_id' => $transactionId,
            'status' => 'failed',
            'error_code' => 'REFUND_LIMIT_EXCEEDED',
            'error_message' => 'Refund amount exceeds captured amount',
            'amount' => $amount,
            'timestamp' => date('c'),
        ];
    }

    /**
     * Get current retry count (for testing)
     */
    public function getRetryCount(): int
    {
        return $this->retryCount;
    }

    /**
     * Reset retry count
     */
    public function resetRetryCount(): void
    {
        $this->retryCount = 0;
    }
}

// @Author Moustafa M S