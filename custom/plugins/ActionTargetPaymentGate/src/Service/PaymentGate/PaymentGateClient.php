<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Service\PaymentGate;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Shopware\Core\System\SystemConfig\SystemConfigService;

/**
 * PaymentGate API Client
 * 
 * Handles communication with PaymentGate API for payment processing
 */
class PaymentGateClient
{
    private const SANDBOX_URL = 'https://sandbox-api.paymentgate.com/v1';
    private const PRODUCTION_URL = 'https://api.paymentgate.com/v1';
    private const API_VERSION = '1.0';
    private const DEFAULT_TIMEOUT = 30;

    private Client $httpClient;
    private SystemConfigService $systemConfigService;
    private LoggerInterface $logger;

    public function __construct(
        SystemConfigService $systemConfigService,
        LoggerInterface $logger
    ) {
        $this->systemConfigService = $systemConfigService;
        $this->logger = $logger;
        $this->httpClient = new Client([
            'timeout' => $this->getTimeout(),
            'verify' => true,
        ]);
    }

    /**
     * Authorize a payment
     */
    public function authorize(array $paymentData): array
    {
        // Only log non-sensitive data
        $this->logger->info('PaymentGate: Authorizing payment', [
            'amount' => $paymentData['amount'] ?? null,
            'currency' => $paymentData['currency'] ?? null,
            'order_id' => $paymentData['order_id'] ?? null,
        ]);

        try {
            $response = $this->request('POST', '/payments/authorize', $paymentData);
            
            $this->logger->info('PaymentGate: Authorization successful', [
                'transaction_id' => $response['transaction_id'] ?? null,
            ]);

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Authorization failed', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Capture a previously authorized payment
     */
    public function capture(string $transactionId, float $amount): array
    {
        $this->logger->info('PaymentGate: Capturing payment', [
            'transaction_id' => $transactionId,
            'amount' => $amount,
        ]);

        try {
            $response = $this->request('POST', "/payments/{$transactionId}/capture", [
                'amount' => $amount,
            ]);

            $this->logger->info('PaymentGate: Capture successful', [
                'transaction_id' => $transactionId,
            ]);

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Capture failed', [
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Refund a captured payment
     */
    public function refund(string $transactionId, float $amount, ?string $reason = null): array
    {
        $this->logger->info('PaymentGate: Refunding payment', [
            'transaction_id' => $transactionId,
            'amount' => $amount,
            'reason' => $reason,
        ]);

        try {
            $response = $this->request('POST', "/payments/{$transactionId}/refund", [
                'amount' => $amount,
                'reason' => $reason,
            ]);

            $this->logger->info('PaymentGate: Refund successful', [
                'transaction_id' => $transactionId,
            ]);

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Refund failed', [
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Void an authorized payment
     */
    public function void(string $transactionId): array
    {
        $this->logger->info('PaymentGate: Voiding payment', [
            'transaction_id' => $transactionId,
        ]);

        try {
            $response = $this->request('POST', "/payments/{$transactionId}/void", []);

            $this->logger->info('PaymentGate: Void successful', [
                'transaction_id' => $transactionId,
            ]);

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Void failed', [
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Get payment status
     */
    public function getPaymentStatus(string $transactionId): array
    {
        try {
            return $this->request('GET', "/payments/{$transactionId}", []);
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Failed to get payment status', [
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Save payment method for future use
     */
    public function savePaymentMethod(array $paymentMethodData): array
    {
        // Only log non-sensitive payment method info
        $this->logger->info('PaymentGate: Saving payment method', [
            'type' => $paymentMethodData['type'] ?? null,
            'last4' => $paymentMethodData['last4'] ?? null,
        ]);

        try {
            $response = $this->request('POST', '/payment-methods', $paymentMethodData);

            $this->logger->info('PaymentGate: Payment method saved', [
                'payment_method_id' => $response['payment_method_id'] ?? null,
            ]);

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Failed to save payment method', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Delete saved payment method
     */
    public function deletePaymentMethod(string $paymentMethodId): array
    {
        $this->logger->info('PaymentGate: Deleting payment method', [
            'payment_method_id' => $paymentMethodId,
        ]);

        try {
            $response = $this->request('DELETE', "/payment-methods/{$paymentMethodId}", []);

            $this->logger->info('PaymentGate: Payment method deleted');

            return $response;
        } catch (\Exception $e) {
            $this->logger->error('PaymentGate: Failed to delete payment method', [
                'payment_method_id' => $paymentMethodId,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    /**
     * Make HTTP request to PaymentGate API
     */
    private function request(string $method, string $endpoint, array $data): array
    {
        $url = $this->getBaseUrl() . $endpoint;
        
        $options = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getApiKey(),
                'Content-Type' => 'application/json',
                'X-API-Version' => self::API_VERSION,
            ],
        ];

        if (!empty($data)) {
            $options['json'] = $data;
        }

        try {
            $response = $this->httpClient->request($method, $url, $options);
            $body = (string) $response->getBody();
            
            $decoded = json_decode($body, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException(
                    'Failed to decode PaymentGate API response: ' . json_last_error_msg()
                );
            }
            
            return $decoded ?? [];
        } catch (GuzzleException $e) {
            $this->logger->error('PaymentGate API request failed', [
                'method' => $method,
                'endpoint' => $endpoint,
                'error' => $e->getMessage(),
            ]);
            
            throw new \RuntimeException(
                'PaymentGate API request failed: ' . $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * Get base URL based on environment
     */
    private function getBaseUrl(): string
    {
        $environment = $this->systemConfigService->getString(
            'ActionTargetPaymentGate.config.environment'
        );

        return $environment === 'production' ? self::PRODUCTION_URL : self::SANDBOX_URL;
    }

    /**
     * Get API key from configuration
     */
    private function getApiKey(): string
    {
        $apiKey = $this->systemConfigService->getString(
            'ActionTargetPaymentGate.config.apiKey'
        );
        
        if (empty($apiKey)) {
            throw new \RuntimeException('PaymentGate API key is not configured');
        }
        
        return $apiKey;
    }

    /**
     * Get API timeout from configuration
     */
    private function getTimeout(): int
    {
        return $this->systemConfigService->getInt(
            'ActionTargetPaymentGate.config.apiTimeout',
            self::DEFAULT_TIMEOUT
        );
    }

    /**
     * Check if test mode is enabled
     */
    public function isTestMode(): bool
    {
        return $this->systemConfigService->getBool(
            'ActionTargetPaymentGate.config.enableTestMode',
            false
        );
    }
}

// @Author Moustafa M S