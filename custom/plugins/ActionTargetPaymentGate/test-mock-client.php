<?php declare(strict_types=1);

/**
 * Quick Test Script for Mock PaymentGate Client
 * 
 * Run this script to verify the mock client is working correctly
 * Usage: php test-mock-client.php
 */

require_once __DIR__ . '/vendor/autoload.php';

use ActionTarget\PaymentGate\Service\PaymentGate\MockPaymentGateClient;
use Psr\Log\NullLogger;

// Mock SystemConfigService for testing
$systemConfigService = new class {
    public function getString(string $key, string $default = ''): string {
        return $default;
    }
    
    public function getInt(string $key, int $default = 0): int {
        return $default;
    }
    
    public function getBool(string $key, bool $default = false): bool {
        return $default;
    }
};

// Create mock client
$mockClient = new MockPaymentGateClient($systemConfigService, new NullLogger());

echo "\n";
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║   PaymentGate Mock Client Test Suite                      ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n";
echo "\n";

$testsPassed = 0;
$testsFailed = 0;

// Helper function to run tests
function runTest(string $name, callable $test): void {
    global $testsPassed, $testsFailed;
    
    echo "Testing: {$name}... ";
    
    try {
        $test();
        echo "✓ PASS\n";
        $testsPassed++;
    } catch (\Exception $e) {
        echo "✗ FAIL\n";
        echo "  Error: {$e->getMessage()}\n";
        $testsFailed++;
    }
}

// Test 1: Successful Authorization
runTest('Successful Authorization', function() use ($mockClient) {
    $mockClient->setMockMode('success');
    $response = $mockClient->authorize([
        'amount' => 100.00,
        'currency' => 'USD',
        'order_id' => 'TEST-001',
    ]);
    
    if (!$response['success']) {
        throw new \Exception('Authorization should succeed');
    }
    if ($response['status'] !== 'authorized') {
        throw new \Exception('Status should be authorized');
    }
    if (!isset($response['transaction_id'])) {
        throw new \Exception('Missing transaction_id');
    }
});

// Test 2: Failed Authorization
runTest('Failed Authorization', function() use ($mockClient) {
    $mockClient->setMockMode('failure');
    $response = $mockClient->authorize([
        'amount' => 100.00,
        'currency' => 'USD',
    ]);
    
    if ($response['success']) {
        throw new \Exception('Authorization should fail');
    }
    if (!isset($response['error_code'])) {
        throw new \Exception('Missing error_code');
    }
    if ($response['error_code'] !== 'INSUFFICIENT_FUNDS') {
        throw new \Exception('Wrong error code');
    }
});

// Test 3: Retry Logic
runTest('Retry Logic', function() use ($mockClient) {
    $mockClient->setMockMode('retry');
    $mockClient->resetRetryCount();
    
    $r1 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
    if ($r1['success'] || $r1['status'] !== 'retry') {
        throw new \Exception('First attempt should fail with retry');
    }
    
    $r2 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
    if ($r2['success'] || $r2['status'] !== 'retry') {
        throw new \Exception('Second attempt should fail with retry');
    }
    
    $r3 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
    if (!$r3['success'] || $r3['status'] !== 'authorized') {
        throw new \Exception('Third attempt should succeed');
    }
});

// Test 4: Network Error
runTest('Network Error', function() use ($mockClient) {
    $mockClient->setMockMode('network_error');
    
    try {
        $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
        throw new \Exception('Should have thrown network error');
    } catch (\RuntimeException $e) {
        if ($e->getMessage() !== 'Network connection failed') {
            throw new \Exception('Wrong error message');
        }
    }
});

// Test 5: Timeout Error
runTest('Timeout Error', function() use ($mockClient) {
    $mockClient->setMockMode('timeout');
    
    try {
        $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
        throw new \Exception('Should have thrown timeout error');
    } catch (\RuntimeException $e) {
        if ($e->getMessage() !== 'Request timeout') {
            throw new \Exception('Wrong error message');
        }
    }
});

// Test 6: Successful Capture
runTest('Successful Capture', function() use ($mockClient) {
    $mockClient->setMockMode('success');
    $response = $mockClient->capture('txn_123456', 100.00);
    
    if (!$response['success']) {
        throw new \Exception('Capture should succeed');
    }
    if ($response['status'] !== 'captured') {
        throw new \Exception('Status should be captured');
    }
    if (!isset($response['capture_id'])) {
        throw new \Exception('Missing capture_id');
    }
});

// Test 7: Failed Capture
runTest('Failed Capture', function() use ($mockClient) {
    $mockClient->setMockMode('failure');
    $response = $mockClient->capture('txn_expired', 100.00);
    
    if ($response['success']) {
        throw new \Exception('Capture should fail');
    }
    if ($response['error_code'] !== 'AUTHORIZATION_EXPIRED') {
        throw new \Exception('Wrong error code');
    }
});

// Test 8: Successful Refund
runTest('Successful Refund', function() use ($mockClient) {
    $mockClient->setMockMode('success');
    $response = $mockClient->refund('txn_123456', 50.00, 'Customer request');
    
    if (!$response['success']) {
        throw new \Exception('Refund should succeed');
    }
    if ($response['status'] !== 'refunded') {
        throw new \Exception('Status should be refunded');
    }
    if ($response['amount'] !== 50.00) {
        throw new \Exception('Wrong refund amount');
    }
});

// Test 9: Failed Refund
runTest('Failed Refund', function() use ($mockClient) {
    $mockClient->setMockMode('failure');
    $response = $mockClient->refund('txn_123456', 200.00);
    
    if ($response['success']) {
        throw new \Exception('Refund should fail');
    }
    if ($response['error_code'] !== 'REFUND_LIMIT_EXCEEDED') {
        throw new \Exception('Wrong error code');
    }
});

// Test 10: Void Payment
runTest('Void Payment', function() use ($mockClient) {
    $mockClient->setMockMode('success');
    $response = $mockClient->void('txn_123456');
    
    if (!$response['success']) {
        throw new \Exception('Void should succeed');
    }
    if ($response['status'] !== 'voided') {
        throw new \Exception('Status should be voided');
    }
});

// Test 11: Get Payment Status
runTest('Get Payment Status', function() use ($mockClient) {
    $response = $mockClient->getPaymentStatus('txn_123456');
    
    if (!$response['success']) {
        throw new \Exception('Get status should succeed');
    }
    if (!isset($response['authorized_amount'])) {
        throw new \Exception('Missing authorized_amount');
    }
    if (!isset($response['captured_amount'])) {
        throw new \Exception('Missing captured_amount');
    }
});

// Test 12: Save Payment Method
runTest('Save Payment Method', function() use ($mockClient) {
    $mockClient->setMockMode('success');
    $response = $mockClient->savePaymentMethod([
        'type' => 'card',
        'last4' => '4242',
        'brand' => 'visa',
    ]);
    
    if (!$response['success']) {
        throw new \Exception('Save payment method should succeed');
    }
    if (!isset($response['payment_method_id'])) {
        throw new \Exception('Missing payment_method_id');
    }
});

// Test 13: Delete Payment Method
runTest('Delete Payment Method', function() use ($mockClient) {
    $response = $mockClient->deletePaymentMethod('pm_123456');
    
    if (!$response['success']) {
        throw new \Exception('Delete should succeed');
    }
});

// Test 14: Custom Mock Response
runTest('Custom Mock Response', function() use ($mockClient) {
    $customResponse = [
        'success' => true,
        'transaction_id' => 'CUSTOM-123',
        'custom_field' => 'custom_value',
    ];
    
    $mockClient->setMockResponse('authorize', $customResponse);
    $response = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
    
    if ($response['transaction_id'] !== 'CUSTOM-123') {
        throw new \Exception('Custom response not applied');
    }
    if ($response['custom_field'] !== 'custom_value') {
        throw new \Exception('Custom field missing');
    }
});

// Test 15: Retry Count Tracking
runTest('Retry Count Tracking', function() use ($mockClient) {
    $mockClient->setMockMode('retry');
    $mockClient->resetRetryCount();
    
    if ($mockClient->getRetryCount() !== 0) {
        throw new \Exception('Initial retry count should be 0');
    }
    
    $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
    if ($mockClient->getRetryCount() !== 1) {
        throw new \Exception('Retry count should be 1');
    }
    
    $mockClient->resetRetryCount();
    if ($mockClient->getRetryCount() !== 0) {
        throw new \Exception('Reset should set count to 0');
    }
});

// Summary
echo "\n";
echo "╔════════════════════════════════════════════════════════════╗\n";
echo "║   Test Results                                             ║\n";
echo "╚════════════════════════════════════════════════════════════╝\n";
echo "\n";
echo "  Total Tests:  " . ($testsPassed + $testsFailed) . "\n";
echo "  ✓ Passed:     {$testsPassed}\n";
echo "  ✗ Failed:     {$testsFailed}\n";
echo "\n";

if ($testsFailed === 0) {
    echo "  🎉 All tests passed! Mock client is working correctly.\n";
    echo "\n";
    echo "  Next steps:\n";
    echo "  1. Install plugin in Shopware: php bin/console plugin:install ActionTargetPaymentGate --activate\n";
    echo "  2. Configure plugin in admin: http://localhost:8000/admin\n";
    echo "  3. Test payment flow in storefront\n";
    echo "\n";
    exit(0);
} else {
    echo "  ⚠️  Some tests failed. Please review the errors above.\n";
    echo "\n";
    exit(1);
}

// @Author Moustafa M S
