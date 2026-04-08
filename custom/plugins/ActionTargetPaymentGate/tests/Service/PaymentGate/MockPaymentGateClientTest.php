<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Tests\Service\PaymentGate;

use ActionTarget\PaymentGate\Service\PaymentGate\MockPaymentGateClient;
use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Shopware\Core\System\SystemConfig\SystemConfigService;

/**
 * Mock PaymentGate Client Tests
 * 
 * Demonstrates testing with different mock scenarios:
 * - Success responses
 * - Failure responses
 * - Retry scenarios
 * - Network errors
 */
class MockPaymentGateClientTest extends TestCase
{
    private MockPaymentGateClient $mockClient;

    protected function setUp(): void
    {
        $systemConfigService = $this->createMock(SystemConfigService::class);
        $logger = new NullLogger();
        
        $this->mockClient = new MockPaymentGateClient($systemConfigService, $logger);
    }

    /**
     * Test successful authorization
     */
    public function testSuccessfulAuthorization(): void
    {
        $this->mockClient->setMockMode('success');

        $paymentData = [
            'amount' => 100.00,
            'currency' => 'USD',
            'order_id' => 'ORDER-123',
            'customer_id' => 'CUST-456',
        ];

        $response = $this->mockClient->authorize($paymentData);

        $this->assertTrue($response['success']);
        $this->assertEquals('authorized', $response['status']);
        $this->assertEquals(100.00, $response['amount']);
        $this->assertEquals('USD', $response['currency']);
        $this->assertArrayHasKey('transaction_id', $response);
        $this->assertArrayHasKey('authorization_code', $response);
    }

    /**
     * Test failed authorization
     */
    public function testFailedAuthorization(): void
    {
        $this->mockClient->setMockMode('failure');

        $paymentData = [
            'amount' => 100.00,
            'currency' => 'USD',
            'order_id' => 'ORDER-123',
        ];

        $response = $this->mockClient->authorize($paymentData);

        $this->assertFalse($response['success']);
        $this->assertEquals('failed', $response['status']);
        $this->assertArrayHasKey('error_code', $response);
        $this->assertArrayHasKey('error_message', $response);
        $this->assertEquals('INSUFFICIENT_FUNDS', $response['error_code']);
    }

    /**
     * Test retry scenario
     */
    public function testRetryAuthorization(): void
    {
        $this->mockClient->setMockMode('retry');

        $paymentData = [
            'amount' => 100.00,
            'currency' => 'USD',
            'order_id' => 'ORDER-123',
        ];

        // First attempt - should fail with retry status
        $response1 = $this->mockClient->authorize($paymentData);
        $this->assertFalse($response1['success']);
        $this->assertEquals('retry', $response1['status']);
        $this->assertEquals('TEMPORARY_ERROR', $response1['error_code']);
        $this->assertEquals(1, $response1['attempt']);

        // Second attempt - should still fail
        $response2 = $this->mockClient->authorize($paymentData);
        $this->assertFalse($response2['success']);
        $this->assertEquals('retry', $response2['status']);
        $this->assertEquals(2, $response2['attempt']);

        // Third attempt - should succeed
        $response3 = $this->mockClient->authorize($paymentData);
        $this->assertTrue($response3['success']);
        $this->assertEquals('authorized', $response3['status']);
    }

    /**
     * Test network error
     */
    public function testNetworkError(): void
    {
        $this->mockClient->setMockMode('network_error');

        $paymentData = [
            'amount' => 100.00,
            'currency' => 'USD',
        ];

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Network connection failed');

        $this->mockClient->authorize($paymentData);
    }

    /**
     * Test timeout error
     */
    public function testTimeoutError(): void
    {
        $this->mockClient->setMockMode('timeout');

        $paymentData = [
            'amount' => 100.00,
            'currency' => 'USD',
        ];

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Request timeout');

        $this->mockClient->authorize($paymentData);
    }

    /**
     * Test successful capture
     */
    public function testSuccessfulCapture(): void
    {
        $this->mockClient->setMockMode('success');

        $response = $this->mockClient->capture('txn_123456', 100.00);

        $this->assertTrue($response['success']);
        $this->assertEquals('captured', $response['status']);
        $this->assertEquals('txn_123456', $response['transaction_id']);
        $this->assertEquals(100.00, $response['amount']);
        $this->assertArrayHasKey('capture_id', $response);
    }

    /**
     * Test failed capture
     */
    public function testFailedCapture(): void
    {
        $this->mockClient->setMockMode('failure');

        $response = $this->mockClient->capture('txn_123456', 100.00);

        $this->assertFalse($response['success']);
        $this->assertEquals('failed', $response['status']);
        $this->assertEquals('AUTHORIZATION_EXPIRED', $response['error_code']);
    }

    /**
     * Test retry capture
     */
    public function testRetryCapture(): void
    {
        $this->mockClient->setMockMode('retry');

        // First attempt - should fail
        $response1 = $this->mockClient->capture('txn_123456', 100.00);
        $this->assertFalse($response1['success']);
        $this->assertEquals('retry', $response1['status']);

        // Second attempt - should succeed
        $response2 = $this->mockClient->capture('txn_123456', 100.00);
        $this->assertTrue($response2['success']);
        $this->assertEquals('captured', $response2['status']);
    }

    /**
     * Test successful refund
     */
    public function testSuccessfulRefund(): void
    {
        $this->mockClient->setMockMode('success');

        $response = $this->mockClient->refund('txn_123456', 50.00, 'Customer request');

        $this->assertTrue($response['success']);
        $this->assertEquals('refunded', $response['status']);
        $this->assertEquals('txn_123456', $response['transaction_id']);
        $this->assertEquals(50.00, $response['amount']);
        $this->assertEquals('Customer request', $response['reason']);
        $this->assertArrayHasKey('refund_id', $response);
    }

    /**
     * Test failed refund
     */
    public function testFailedRefund(): void
    {
        $this->mockClient->setMockMode('failure');

        $response = $this->mockClient->refund('txn_123456', 150.00);

        $this->assertFalse($response['success']);
        $this->assertEquals('failed', $response['status']);
        $this->assertEquals('REFUND_LIMIT_EXCEEDED', $response['error_code']);
    }

    /**
     * Test successful void
     */
    public function testSuccessfulVoid(): void
    {
        $this->mockClient->setMockMode('success');

        $response = $this->mockClient->void('txn_123456');

        $this->assertTrue($response['success']);
        $this->assertEquals('voided', $response['status']);
        $this->assertEquals('txn_123456', $response['transaction_id']);
    }

    /**
     * Test failed void
     */
    public function testFailedVoid(): void
    {
        $this->mockClient->setMockMode('failure');

        $response = $this->mockClient->void('txn_123456');

        $this->assertFalse($response['success']);
        $this->assertEquals('VOID_FAILED', $response['error_code']);
    }

    /**
     * Test get payment status
     */
    public function testGetPaymentStatus(): void
    {
        $response = $this->mockClient->getPaymentStatus('txn_123456');

        $this->assertTrue($response['success']);
        $this->assertEquals('txn_123456', $response['transaction_id']);
        $this->assertEquals('authorized', $response['status']);
        $this->assertArrayHasKey('amount', $response);
        $this->assertArrayHasKey('authorized_amount', $response);
        $this->assertArrayHasKey('captured_amount', $response);
        $this->assertArrayHasKey('refunded_amount', $response);
    }

    /**
     * Test save payment method - success
     */
    public function testSavePaymentMethodSuccess(): void
    {
        $this->mockClient->setMockMode('success');

        $paymentMethodData = [
            'type' => 'card',
            'last4' => '4242',
            'brand' => 'visa',
            'exp_month' => 12,
            'exp_year' => 2025,
        ];

        $response = $this->mockClient->savePaymentMethod($paymentMethodData);

        $this->assertTrue($response['success']);
        $this->assertArrayHasKey('payment_method_id', $response);
        $this->assertEquals('card', $response['type']);
        $this->assertEquals('4242', $response['last4']);
        $this->assertEquals('visa', $response['brand']);
    }

    /**
     * Test save payment method - failure
     */
    public function testSavePaymentMethodFailure(): void
    {
        $this->mockClient->setMockMode('failure');

        $paymentMethodData = [
            'type' => 'card',
            'card_number' => 'invalid',
        ];

        $response = $this->mockClient->savePaymentMethod($paymentMethodData);

        $this->assertFalse($response['success']);
        $this->assertEquals('INVALID_CARD', $response['error_code']);
    }

    /**
     * Test delete payment method
     */
    public function testDeletePaymentMethod(): void
    {
        $response = $this->mockClient->deletePaymentMethod('pm_123456');

        $this->assertTrue($response['success']);
        $this->assertEquals('pm_123456', $response['payment_method_id']);
    }

    /**
     * Test custom mock response
     */
    public function testCustomMockResponse(): void
    {
        $customResponse = [
            'success' => true,
            'transaction_id' => 'custom_txn_123',
            'status' => 'pending',
            'custom_field' => 'custom_value',
        ];

        $this->mockClient->setMockResponse('authorize', $customResponse);

        $response = $this->mockClient->authorize([
            'amount' => 100.00,
            'currency' => 'USD',
        ]);

        $this->assertEquals($customResponse, $response);
        $this->assertEquals('custom_txn_123', $response['transaction_id']);
        $this->assertEquals('pending', $response['status']);
        $this->assertEquals('custom_value', $response['custom_field']);
    }

    /**
     * Test retry count tracking
     */
    public function testRetryCountTracking(): void
    {
        $this->mockClient->setMockMode('retry');
        $this->assertEquals(0, $this->mockClient->getRetryCount());

        $this->mockClient->authorize(['amount' => 100.00]);
        $this->assertEquals(1, $this->mockClient->getRetryCount());

        $this->mockClient->authorize(['amount' => 100.00]);
        $this->assertEquals(2, $this->mockClient->getRetryCount());

        $this->mockClient->resetRetryCount();
        $this->assertEquals(0, $this->mockClient->getRetryCount());
    }
}

// @Author Moustafa M S