# Testing Guide - Action Target PaymentGate Plugin

This guide provides comprehensive instructions for testing the PaymentGate plugin locally with mock responses.

## Table of Contents

1. [Setup for Local Testing](#setup-for-local-testing)
2. [Mock Client Usage](#mock-client-usage)
3. [Testing Scenarios](#testing-scenarios)
4. [Integration Testing](#integration-testing)
5. [Admin Testing](#admin-testing)
6. [Troubleshooting](#troubleshooting)

## Setup for Local Testing

### Prerequisites

- Shopware 6.7.0+ running locally
- PHP 8.2+
- Composer installed
- Access to Shopware admin at http://localhost:8000/admin

### Installation Steps

1. **Navigate to plugin directory**
   ```bash
   cd custom/plugins/ActionTargetPaymentGate
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Return to Shopware root**
   ```bash
   cd ../../..
   ```

4. **Refresh plugins**
   ```bash
   php bin/console plugin:refresh
   ```

5. **Install and activate plugin**
   ```bash
   php bin/console plugin:install ActionTargetPaymentGate --activate
   ```

6. **Clear cache**
   ```bash
   php bin/console cache:clear
   ```

### Verify Installation

```bash
# Check plugin status
php bin/console plugin:list | grep ActionTarget

# Expected output:
# ActionTargetPaymentGate    1.0.0    Yes    Yes    Action Target PaymentGate
```

## Mock Client Usage

### Basic Mock Setup

```php
use ActionTarget\PaymentGate\Service\PaymentGate\MockPaymentGateClient;
use Psr\Log\NullLogger;

// Create mock client
$mockClient = new MockPaymentGateClient(
    $systemConfigService,
    new NullLogger()
);

// Set desired test mode
$mockClient->setMockMode('success'); // or 'failure', 'retry', 'network_error', 'timeout'
```

### Available Mock Modes

| Mode | Behavior | Use Case |
|------|----------|----------|
| `success` | All operations succeed | Happy path testing |
| `failure` | Operations fail with realistic errors | Error handling testing |
| `retry` | Fails initially, succeeds after retries | Retry logic testing |
| `network_error` | Throws network exception | Network failure testing |
| `timeout` | Throws timeout exception | Timeout handling testing |

## Testing Scenarios

### Scenario 1: Successful Payment Flow

**Objective**: Test complete payment lifecycle from authorization to capture to refund.

```php
// 1. Set success mode
$mockClient->setMockMode('success');

// 2. Authorize payment
$authResponse = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
    'order_id' => 'TEST-ORDER-001',
    'customer_id' => 'CUST-123',
    'payment_method' => 'credit_card',
]);

// Verify authorization
assert($authResponse['success'] === true);
assert($authResponse['status'] === 'authorized');
assert(isset($authResponse['transaction_id']));
assert(isset($authResponse['authorization_code']));

echo "✓ Authorization successful\n";
echo "  Transaction ID: {$authResponse['transaction_id']}\n";
echo "  Auth Code: {$authResponse['authorization_code']}\n";

// 3. Capture payment
$captureResponse = $mockClient->capture(
    $authResponse['transaction_id'],
    100.00
);

// Verify capture
assert($captureResponse['success'] === true);
assert($captureResponse['status'] === 'captured');
assert(isset($captureResponse['capture_id']));

echo "✓ Capture successful\n";
echo "  Capture ID: {$captureResponse['capture_id']}\n";

// 4. Partial refund
$refundResponse = $mockClient->refund(
    $authResponse['transaction_id'],
    50.00,
    'Customer requested partial refund'
);

// Verify refund
assert($refundResponse['success'] === true);
assert($refundResponse['status'] === 'refunded');
assert($refundResponse['amount'] === 50.00);

echo "✓ Refund successful\n";
echo "  Refund ID: {$refundResponse['refund_id']}\n";
echo "  Amount: \${$refundResponse['amount']}\n";
```

**Expected Output**:
```
✓ Authorization successful
  Transaction ID: txn_a1b2c3d4e5f6g7h8
  Auth Code: AUTH123456
✓ Capture successful
  Capture ID: cap_x1y2z3a4b5c6d7e8
✓ Refund successful
  Refund ID: ref_m1n2o3p4q5r6s7t8
  Amount: $50.00
```

### Scenario 2: Payment Failure Handling

**Objective**: Test error handling for failed payments.

```php
// Set failure mode
$mockClient->setMockMode('failure');

// Attempt authorization
$authResponse = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
    'order_id' => 'TEST-ORDER-002',
]);

// Verify failure
assert($authResponse['success'] === false);
assert($authResponse['status'] === 'failed');
assert(isset($authResponse['error_code']));
assert(isset($authResponse['error_message']));

echo "✗ Authorization failed (expected)\n";
echo "  Error Code: {$authResponse['error_code']}\n";
echo "  Error Message: {$authResponse['error_message']}\n";

// Test different failure scenarios
$captureResponse = $mockClient->capture('txn_expired', 100.00);
assert($captureResponse['error_code'] === 'AUTHORIZATION_EXPIRED');

$refundResponse = $mockClient->refund('txn_123', 200.00);
assert($refundResponse['error_code'] === 'REFUND_LIMIT_EXCEEDED');

echo "✓ All failure scenarios handled correctly\n";
```

**Expected Output**:
```
✗ Authorization failed (expected)
  Error Code: INSUFFICIENT_FUNDS
  Error Message: Insufficient funds in account
✓ All failure scenarios handled correctly
```

### Scenario 3: Retry Logic Testing

**Objective**: Test automatic retry mechanism.

```php
// Set retry mode
$mockClient->setMockMode('retry');
$mockClient->resetRetryCount();

echo "Testing retry logic...\n";

// Attempt 1 - Should fail
$response1 = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
]);

assert($response1['success'] === false);
assert($response1['status'] === 'retry');
assert($response1['attempt'] === 1);
echo "  Attempt 1: Failed (retry requested)\n";

// Attempt 2 - Should fail
$response2 = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
]);

assert($response2['success'] === false);
assert($response2['status'] === 'retry');
assert($response2['attempt'] === 2);
echo "  Attempt 2: Failed (retry requested)\n";

// Attempt 3 - Should succeed
$response3 = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
]);

assert($response3['success'] === true);
assert($response3['status'] === 'authorized');
echo "  Attempt 3: Success!\n";

echo "✓ Retry logic working correctly\n";
```

**Expected Output**:
```
Testing retry logic...
  Attempt 1: Failed (retry requested)
  Attempt 2: Failed (retry requested)
  Attempt 3: Success!
✓ Retry logic working correctly
```

### Scenario 4: Network Error Handling

**Objective**: Test network failure scenarios.

```php
// Set network error mode
$mockClient->setMockMode('network_error');

echo "Testing network error handling...\n";

try {
    $mockClient->authorize([
        'amount' => 100.00,
        'currency' => 'USD',
    ]);
    
    echo "✗ Should have thrown exception\n";
} catch (\RuntimeException $e) {
    assert($e->getMessage() === 'Network connection failed');
    echo "✓ Network error caught correctly\n";
    echo "  Error: {$e->getMessage()}\n";
}

// Test timeout
$mockClient->setMockMode('timeout');

try {
    $mockClient->authorize([
        'amount' => 100.00,
        'currency' => 'USD',
    ]);
    
    echo "✗ Should have thrown exception\n";
} catch (\RuntimeException $e) {
    assert($e->getMessage() === 'Request timeout');
    echo "✓ Timeout error caught correctly\n";
    echo "  Error: {$e->getMessage()}\n";
}
```

**Expected Output**:
```
Testing network error handling...
✓ Network error caught correctly
  Error: Network connection failed
✓ Timeout error caught correctly
  Error: Request timeout
```

### Scenario 5: Custom Mock Responses

**Objective**: Test with custom response data.

```php
// Set custom authorization response
$mockClient->setMockResponse('authorize', [
    'success' => true,
    'transaction_id' => 'CUSTOM-TXN-12345',
    'status' => 'pending_review',
    'amount' => 100.00,
    'currency' => 'USD',
    'fraud_score' => 0.15,
    'requires_3ds' => true,
    'redirect_url' => 'https://3ds.example.com/verify',
]);

$response = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
]);

assert($response['transaction_id'] === 'CUSTOM-TXN-12345');
assert($response['status'] === 'pending_review');
assert($response['requires_3ds'] === true);

echo "✓ Custom mock response working\n";
echo "  Transaction ID: {$response['transaction_id']}\n";
echo "  Status: {$response['status']}\n";
echo "  Fraud Score: {$response['fraud_score']}\n";
echo "  3DS Required: " . ($response['requires_3ds'] ? 'Yes' : 'No') . "\n";
```

**Expected Output**:
```
✓ Custom mock response working
  Transaction ID: CUSTOM-TXN-12345
  Status: pending_review
  Fraud Score: 0.15
  3DS Required: Yes
```

## Integration Testing

### Running PHPUnit Tests

```bash
# From plugin directory
cd custom/plugins/ActionTargetPaymentGate

# Run all tests
vendor/bin/phpunit

# Run specific test file
vendor/bin/phpunit tests/Service/PaymentGate/MockPaymentGateClientTest.php

# Run with verbose output
vendor/bin/phpunit --verbose

# Run with coverage (requires xdebug)
vendor/bin/phpunit --coverage-html coverage/
```

### Test Coverage

The test suite includes:
- ✓ Successful authorization
- ✓ Failed authorization
- ✓ Retry authorization
- ✓ Network errors
- ✓ Timeout errors
- ✓ Successful capture
- ✓ Failed capture
- ✓ Retry capture
- ✓ Successful refund
- ✓ Failed refund
- ✓ Successful void
- ✓ Failed void
- ✓ Get payment status
- ✓ Save payment method
- ✓ Delete payment method
- ✓ Custom mock responses
- ✓ Retry count tracking

## Admin Testing

### Access Plugin Configuration

1. Open browser: http://localhost:8000/admin
2. Login with admin credentials
3. Navigate to: **Settings** → **System** → **Plugins**
4. Find **Action Target PaymentGate**
5. Click **Configure**

### Test Configuration Options

**API Credentials**:
- API Key: `test_key_12345`
- API Secret: `test_secret_67890`
- Environment: `sandbox`
- Webhook Secret: `webhook_secret_abc123`

**Payment Behavior**:
- Authorization Mode: `Authorize Only`
- Enable Saved Cards: `Yes`
- Authorization Expiry: `7 days`
- Enable Test Mode: `Yes`

**Payment Methods**:
- Enable Credit Card: `Yes`
- Enable Net 30: `Yes`
- Enable Wire Transfer: `Yes`
- Enable ACH: `No` (future feature)

### Verify Plugin Status

```bash
# Check if plugin is active
php bin/console plugin:list | grep ActionTarget

# View plugin configuration
php bin/console system:config:get ActionTargetPaymentGate
```

## Troubleshooting

### Issue: Plugin not showing in admin

**Solution**:
```bash
php bin/console plugin:refresh
php bin/console cache:clear
```

### Issue: Payment methods not available at checkout

**Checklist**:
1. ✓ Plugin is installed and activated
2. ✓ API credentials are configured
3. ✓ Payment methods are enabled in config
4. ✓ Cache is cleared
5. ✓ Sales channel has payment methods assigned

**Fix**:
```bash
php bin/console payment-method:list
php bin/console cache:clear
```

### Issue: Tests failing

**Common causes**:
- Missing dependencies: Run `composer install`
- Wrong PHP version: Requires PHP 8.2+
- Autoload issues: Run `composer dump-autoload`

**Debug**:
```bash
# Check PHP version
php -v

# Reinstall dependencies
rm -rf vendor/
composer install

# Run tests with verbose output
vendor/bin/phpunit --verbose --debug
```

### Issue: Mock responses not working

**Verify mock mode is set**:
```php
$mockClient->setMockMode('success'); // Must be called before operations
```

**Reset retry count if needed**:
```php
$mockClient->resetRetryCount();
```

## Quick Test Script

Create `test-plugin.php` in plugin root:

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use ActionTarget\PaymentGate\Service\PaymentGate\MockPaymentGateClient;
use Psr\Log\NullLogger;

echo "=== PaymentGate Plugin Test ===\n\n";

// Mock dependencies
$systemConfigService = new class {
    public function getString($key, $default = '') { return $default; }
    public function getInt($key, $default = 0) { return $default; }
    public function getBool($key, $default = false) { return $default; }
};

$mockClient = new MockPaymentGateClient($systemConfigService, new NullLogger());

// Test 1: Success
echo "Test 1: Successful Payment\n";
$mockClient->setMockMode('success');
$response = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
echo $response['success'] ? "✓ PASS\n" : "✗ FAIL\n";

// Test 2: Failure
echo "\nTest 2: Failed Payment\n";
$mockClient->setMockMode('failure');
$response = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
echo !$response['success'] ? "✓ PASS\n" : "✗ FAIL\n";

// Test 3: Retry
echo "\nTest 3: Retry Logic\n";
$mockClient->setMockMode('retry');
$mockClient->resetRetryCount();
$r1 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
$r2 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
$r3 = $mockClient->authorize(['amount' => 100.00, 'currency' => 'USD']);
echo (!$r1['success'] && !$r2['success'] && $r3['success']) ? "✓ PASS\n" : "✗ FAIL\n";

echo "\n=== All Tests Complete ===\n";
```

Run with:
```bash
php test-plugin.php
```

## Next Steps

1. ✓ Complete plugin implementation
2. ✓ Test with mock client
3. → Test in Shopware admin
4. → Test checkout flow
5. → Configure real API credentials
6. → Test with real PaymentGate API
7. → Deploy to production

---

**@Author Moustafa M S** 🤖