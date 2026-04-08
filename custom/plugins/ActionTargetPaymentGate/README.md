# Action Target PaymentGate Plugin

Comprehensive payment integration for Shopware 6 supporting multiple payment methods, authorization-first workflow, and Sage ERP synchronization.

## Features

- **Multiple Payment Methods**
  - Credit Card (async)
  - Net 30 Terms (sync)
  - Wire Transfer (sync)
  - ACH/Bank Account (async)

- **Authorization-First Workflow**
  - Authorize payments at checkout
  - Capture later when shipping
  - Support for partial captures
  - Partial refunds

- **Mock Testing Support**
  - Test success scenarios
  - Test failure scenarios
  - Test retry logic
  - Test network errors
  - Custom mock responses

- **Sage ERP Integration**
  - Automatic payment sync
  - Order status updates
  - Webhook support

## Installation

### Prerequisites

- Shopware 6.7.0 or higher
- PHP 8.2 or higher
- Composer

### Steps

1. **Copy plugin to Shopware**
   ```bash
   # Plugin should be in: custom/plugins/ActionTargetPaymentGate
   ```

2. **Install dependencies**
   ```bash
   cd custom/plugins/ActionTargetPaymentGate
   composer install
   ```

3. **Refresh plugin list**
   ```bash
   # From Shopware root directory
   php bin/console plugin:refresh
   ```

4. **Install the plugin**
   ```bash
   php bin/console plugin:install ActionTargetPaymentGate --activate
   ```

5. **Clear cache**
   ```bash
   php bin/console cache:clear
   ```

## Configuration

Access the plugin configuration in Shopware Admin:

1. Navigate to **Settings** → **System** → **Plugins**
2. Find **Action Target PaymentGate**
3. Click **Configure**

### Required Settings

- **API Key**: Your PaymentGate API key
- **API Secret**: Your PaymentGate API secret
- **Environment**: Choose `sandbox` for testing or `production` for live

### Optional Settings

- **Authorization Mode**: Authorize only or authorize + capture
- **Enable Saved Cards**: Allow customers to save payment methods
- **Enable Test Mode**: Process test payments
- **Sage Integration**: Configure Sage ERP sync

## Testing with Mock Client

The plugin includes a comprehensive mock client for testing without real API calls.

### Using Mock Client in Tests

```php
use ActionTarget\PaymentGate\Service\PaymentGate\MockPaymentGateClient;

// Create mock client
$mockClient = new MockPaymentGateClient($systemConfigService, $logger);

// Test successful payment
$mockClient->setMockMode('success');
$response = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
    'order_id' => 'ORDER-123',
]);
// Response: ['success' => true, 'transaction_id' => '...', ...]

// Test failed payment
$mockClient->setMockMode('failure');
$response = $mockClient->authorize([...]);
// Response: ['success' => false, 'error_code' => 'INSUFFICIENT_FUNDS', ...]

// Test retry scenario
$mockClient->setMockMode('retry');
$response1 = $mockClient->authorize([...]); // Fails with retry status
$response2 = $mockClient->authorize([...]); // Fails again
$response3 = $mockClient->authorize([...]); // Succeeds on 3rd attempt

// Test network error
$mockClient->setMockMode('network_error');
try {
    $mockClient->authorize([...]);
} catch (\RuntimeException $e) {
    // Handle network error
}
```

### Mock Modes

| Mode | Description |
|------|-------------|
| `success` | All operations succeed |
| `failure` | Operations fail with appropriate error codes |
| `retry` | Operations fail initially, succeed after retries |
| `network_error` | Throws network connection exception |
| `timeout` | Throws timeout exception |

### Custom Mock Responses

```php
// Set custom response for specific operation
$mockClient->setMockResponse('authorize', [
    'success' => true,
    'transaction_id' => 'custom_txn_123',
    'status' => 'pending',
    'custom_field' => 'custom_value',
]);

$response = $mockClient->authorize([...]);
// Returns your custom response
```

### Running Tests

```bash
# Run all tests
composer test

# Run specific test
vendor/bin/phpunit tests/Service/PaymentGate/MockPaymentGateClientTest.php

# Run with coverage
composer test:coverage
```

## Testing Scenarios

### 1. Success Scenario

```php
$mockClient->setMockMode('success');

// Authorize
$authResponse = $mockClient->authorize([
    'amount' => 100.00,
    'currency' => 'USD',
]);
// Result: Authorization successful

// Capture
$captureResponse = $mockClient->capture(
    $authResponse['transaction_id'],
    100.00
);
// Result: Capture successful

// Refund
$refundResponse = $mockClient->refund(
    $authResponse['transaction_id'],
    50.00,
    'Customer request'
);
// Result: Refund successful
```

### 2. Failure Scenario

```php
$mockClient->setMockMode('failure');

// Authorize fails
$response = $mockClient->authorize([...]);
// Result: ['success' => false, 'error_code' => 'INSUFFICIENT_FUNDS']

// Capture fails (authorization expired)
$response = $mockClient->capture('txn_123', 100.00);
// Result: ['success' => false, 'error_code' => 'AUTHORIZATION_EXPIRED']

// Refund fails (exceeds captured amount)
$response = $mockClient->refund('txn_123', 200.00);
// Result: ['success' => false, 'error_code' => 'REFUND_LIMIT_EXCEEDED']
```

### 3. Retry Scenario

```php
$mockClient->setMockMode('retry');

// First attempt fails
$response1 = $mockClient->authorize([...]);
// Result: ['success' => false, 'status' => 'retry', 'attempt' => 1]

// Second attempt fails
$response2 = $mockClient->authorize([...]);
// Result: ['success' => false, 'status' => 'retry', 'attempt' => 2]

// Third attempt succeeds
$response3 = $mockClient->authorize([...]);
// Result: ['success' => true, 'status' => 'authorized']
```

### 4. Network Error Scenario

```php
$mockClient->setMockMode('network_error');

try {
    $mockClient->authorize([...]);
} catch (\RuntimeException $e) {
    // Handle: "Network connection failed"
    // Implement retry logic or show error to user
}
```

## Payment Flow

### Credit Card Payment

1. Customer enters card details at checkout
2. Plugin authorizes payment via PaymentGate API
3. Order is created with "authorized" status
4. Admin captures payment when shipping order
5. Payment is captured via PaymentGate API
6. Order status updated to "paid"

### Net 30 Payment

1. Customer selects Net 30 at checkout
2. Plugin verifies customer eligibility
3. Payment is authorized with 30-day terms
4. Order is created immediately
5. Invoice is sent to customer
6. Payment captured when customer pays

## API Reference

### PaymentGateClient Methods

```php
// Authorize payment
authorize(array $paymentData): array

// Capture authorized payment
capture(string $transactionId, float $amount): array

// Refund captured payment
refund(string $transactionId, float $amount, ?string $reason): array

// Void authorized payment
void(string $transactionId): array

// Get payment status
getPaymentStatus(string $transactionId): array

// Save payment method
savePaymentMethod(array $paymentMethodData): array

// Delete payment method
deletePaymentMethod(string $paymentMethodId): array
```

### MockPaymentGateClient Additional Methods

```php
// Set mock mode
setMockMode(string $mode): void

// Set custom mock response
setMockResponse(string $method, array $response): void

// Get retry count
getRetryCount(): int

// Reset retry count
resetRetryCount(): void
```

## Troubleshooting

### Plugin not showing in admin

```bash
php bin/console plugin:refresh
php bin/console cache:clear
```

### Payment methods not available

1. Check plugin is activated
2. Verify API credentials in configuration
3. Check payment method availability settings
4. Clear cache

### Test mode not working

1. Enable "Test Mode" in plugin configuration
2. Use test API credentials
3. Set environment to "sandbox"

## Development

### Project Structure

```
ActionTargetPaymentGate/
├── composer.json
├── src/
│   ├── ActionTargetPaymentGate.php
│   ├── Core/
│   │   └── Checkout/
│   │       └── Payment/
│   │           └── PaymentHandler/
│   │               ├── CreditCardHandler.php
│   │               ├── Net30Handler.php
│   │               ├── WireTransferHandler.php
│   │               └── AchHandler.php
│   ├── Service/
│   │   ├── PaymentGate/
│   │   │   ├── PaymentGateClient.php
│   │   │   └── MockPaymentGateClient.php
│   │   ├── Transaction/
│   │   │   └── TransactionService.php
│   │   └── Sage/
│   │       └── SageIntegrationService.php
│   └── Resources/
│       └── config/
│           ├── services.xml
│           └── config.xml
└── tests/
    └── Service/
        └── PaymentGate/
            └── MockPaymentGateClientTest.php
```

### Adding New Payment Methods

1. Create handler in `src/Core/Checkout/Payment/PaymentHandler/`
2. Implement `SynchronousPaymentHandlerInterface` or `AsynchronousPaymentHandlerInterface`
3. Register in `src/Resources/config/services.xml`
4. Add configuration in `src/Resources/config/config.xml`

## Support

For issues or questions:
- Check documentation: [IMPLEMENTATION_GUIDE.md](../../../IMPLEMENTATION_GUIDE.md)
- Review architecture: [PLUGIN_ARCHITECTURE.md](../../../PLUGIN_ARCHITECTURE.md)
- Technical specs: [TECHNICAL_SPECIFICATION.md](../../../TECHNICAL_SPECIFICATION.md)

## License

Proprietary - Action Target

---

**@Author Moustafa M S** 🤖