# Action Target PaymentGate Plugin - Technical Specification

## Document Information
- **Version**: 1.0
- **Last Updated**: 2026-04-07
- **Target Shopware Version**: 6.7.8.2
- **Status**: Draft

## Table of Contents
1. [API Contracts](#api-contracts)
2. [Data Models](#data-models)
3. [Service Interfaces](#service-interfaces)
4. [Event Definitions](#event-definitions)
5. [Configuration Schema](#configuration-schema)
6. [Error Handling](#error-handling)
7. [Security Specifications](#security-specifications)

---

## API Contracts

### PaymentGate API Integration

#### Base Configuration
```
Base URL (Sandbox): https://sandbox-api.paymentgate.example.com/v1
Base URL (Production): https://api.paymentgate.example.com/v1
Authentication: API Key + Secret (Bearer Token)
Content-Type: application/json
```

#### 1. Authorize Payment

**Endpoint**: `POST /payments/authorize`

**Request**:
```json
{
  "amount": 150.00,
  "currency": "USD",
  "payment_method": {
    "type": "credit_card",
    "card_token": "tok_abc123...",
    "save_card": true
  },
  "customer": {
    "id": "cust_xyz789",
    "email": "customer@example.com",
    "name": "John Doe"
  },
  "billing_address": {
    "line1": "123 Main St",
    "city": "Denver",
    "state": "CO",
    "postal_code": "80202",
    "country": "US"
  },
  "metadata": {
    "order_id": "SW-ORDER-12345",
    "customer_ip": "192.168.1.1"
  }
}
```

**Response (Success)**:
```json
{
  "id": "auth_abc123xyz",
  "status": "authorized",
  "amount": 150.00,
  "currency": "USD",
  "authorization_code": "AUTH123456",
  "card": {
    "last_four": "4242",
    "brand": "visa",
    "exp_month": 12,
    "exp_year": 2025
  },
  "payment_method_token": "pm_token_abc123",
  "created_at": "2026-04-07T23:00:00Z",
  "expires_at": "2026-04-14T23:00:00Z"
}
```

**Response (Declined)**:
```json
{
  "error": {
    "code": "card_declined",
    "message": "The card was declined",
    "decline_code": "insufficient_funds",
    "param": "payment_method"
  }
}
```

#### 2. Capture Payment

**Endpoint**: `POST /payments/{payment_id}/capture`

**Request**:
```json
{
  "amount": 150.00,
  "metadata": {
    "shipment_id": "SHIP-12345",
    "invoice_number": "INV-67890"
  }
}
```

**Response**:
```json
{
  "id": "cap_xyz789abc",
  "payment_id": "auth_abc123xyz",
  "status": "captured",
  "amount": 150.00,
  "currency": "USD",
  "captured_at": "2026-04-08T10:30:00Z"
}
```

#### 3. Refund Payment

**Endpoint**: `POST /payments/{payment_id}/refund`

**Request**:
```json
{
  "amount": 50.00,
  "reason": "customer_request",
  "metadata": {
    "order_id": "SW-ORDER-12345",
    "refund_reason": "Product returned"
  }
}
```

**Response**:
```json
{
  "id": "ref_abc123xyz",
  "payment_id": "auth_abc123xyz",
  "status": "refunded",
  "amount": 50.00,
  "currency": "USD",
  "refunded_at": "2026-04-09T14:20:00Z"
}
```

#### 4. Void Authorization

**Endpoint**: `POST /payments/{payment_id}/void`

**Request**:
```json
{
  "reason": "customer_cancelled",
  "metadata": {
    "order_id": "SW-ORDER-12345"
  }
}
```

**Response**:
```json
{
  "id": "auth_abc123xyz",
  "status": "voided",
  "voided_at": "2026-04-07T23:30:00Z"
}
```

#### 5. Get Payment Status

**Endpoint**: `GET /payments/{payment_id}`

**Response**:
```json
{
  "id": "auth_abc123xyz",
  "status": "captured",
  "amount": 150.00,
  "currency": "USD",
  "authorization_code": "AUTH123456",
  "captured_amount": 150.00,
  "refunded_amount": 0.00,
  "created_at": "2026-04-07T23:00:00Z",
  "captured_at": "2026-04-08T10:30:00Z",
  "events": [
    {
      "type": "authorized",
      "amount": 150.00,
      "timestamp": "2026-04-07T23:00:00Z"
    },
    {
      "type": "captured",
      "amount": 150.00,
      "timestamp": "2026-04-08T10:30:00Z"
    }
  ]
}
```

#### 6. Create Payment Token

**Endpoint**: `POST /tokens`

**Request**:
```json
{
  "type": "card",
  "card": {
    "number": "4242424242424242",
    "exp_month": 12,
    "exp_year": 2025,
    "cvc": "123"
  },
  "customer_id": "cust_xyz789"
}
```

**Response**:
```json
{
  "id": "pm_token_abc123",
  "type": "card",
  "card": {
    "last_four": "4242",
    "brand": "visa",
    "exp_month": 12,
    "exp_year": 2025
  },
  "created_at": "2026-04-07T23:00:00Z"
}
```

#### 7. Delete Payment Token

**Endpoint**: `DELETE /tokens/{token_id}`

**Response**:
```json
{
  "id": "pm_token_abc123",
  "deleted": true
}
```

### Sage API Integration

#### Base Configuration
```
Base URL: https://api.sage.actiontarget.com/v1
Authentication: API Key (Header: X-Sage-API-Key)
Content-Type: application/json
```

#### 1. Sync Order to Sage

**Endpoint**: `POST /orders`

**Request**:
```json
{
  "shopware_order_id": "SW-ORDER-12345",
  "order_number": "10001",
  "customer": {
    "sage_customer_id": "CUST-001",
    "email": "customer@example.com",
    "name": "John Doe"
  },
  "payment": {
    "method": "credit_card",
    "status": "authorized",
    "authorization_code": "AUTH123456",
    "amount": 150.00
  },
  "line_items": [
    {
      "sku": "PROD-001",
      "quantity": 2,
      "unit_price": 75.00,
      "total": 150.00
    }
  ]
}
```

**Response**:
```json
{
  "sage_order_id": "SO-12345",
  "shopware_order_id": "SW-ORDER-12345",
  "status": "pending_fulfillment",
  "created_at": "2026-04-07T23:00:00Z"
}
```

#### 2. Request Payment Capture

**Endpoint**: `POST /payments/capture-request`

**Request (from Sage to Shopware)**:
```json
{
  "sage_order_id": "SO-12345",
  "shopware_order_id": "SW-ORDER-12345",
  "shipment_id": "SHIP-12345",
  "capture_amount": 150.00,
  "invoice_number": "INV-67890"
}
```

**Response**:
```json
{
  "status": "capture_initiated",
  "transaction_id": "trans_abc123",
  "capture_amount": 150.00
}
```

#### 3. Sync Payment Status

**Endpoint**: `POST /payments/status-sync`

**Request (from Shopware to Sage)**:
```json
{
  "shopware_order_id": "SW-ORDER-12345",
  "sage_order_id": "SO-12345",
  "payment_status": "captured",
  "captured_amount": 150.00,
  "captured_at": "2026-04-08T10:30:00Z",
  "transaction_id": "trans_abc123"
}
```

**Response**:
```json
{
  "status": "acknowledged",
  "sage_order_id": "SO-12345",
  "updated_at": "2026-04-08T10:30:05Z"
}
```

### Webhook Endpoints

#### 1. PaymentGate Webhook

**Endpoint**: `POST /api/action-target/webhook/paymentgate`

**Headers**:
```
X-PaymentGate-Signature: sha256=abc123...
Content-Type: application/json
```

**Payload**:
```json
{
  "event": "payment.captured",
  "data": {
    "id": "auth_abc123xyz",
    "status": "captured",
    "amount": 150.00,
    "captured_at": "2026-04-08T10:30:00Z"
  },
  "timestamp": "2026-04-08T10:30:01Z"
}
```

#### 2. Sage Webhook

**Endpoint**: `POST /api/action-target/webhook/sage`

**Headers**:
```
X-Sage-Signature: sha256=xyz789...
Content-Type: application/json
```

**Payload**:
```json
{
  "event": "shipment.created",
  "data": {
    "sage_order_id": "SO-12345",
    "shopware_order_id": "SW-ORDER-12345",
    "shipment_id": "SHIP-12345",
    "shipment_amount": 150.00,
    "tracking_number": "1Z999AA10123456784"
  },
  "timestamp": "2026-04-08T10:00:00Z"
}
```

---

## Data Models

### PaymentTransaction Entity

```php
namespace ActionTarget\PaymentGate\Core\Content\PaymentTransaction;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class PaymentTransactionEntity extends Entity
{
    protected string $id;
    protected string $orderId;
    protected string $orderTransactionId;
    protected ?string $paymentGateTransactionId;
    protected ?string $sageTransactionId;
    protected string $paymentMethodType;
    protected float $amount;
    protected string $currency;
    protected string $status; // authorized, captured, refunded, failed, cancelled
    protected ?string $authorizationCode;
    protected float $capturedAmount;
    protected float $refundedAmount;
    protected array $metadata;
    protected \DateTimeInterface $createdAt;
    protected ?\DateTimeInterface $updatedAt;
    
    // Relations
    protected ?OrderEntity $order;
    protected ?OrderTransactionEntity $orderTransaction;
    protected ?PaymentTransactionEventCollection $events;
}
```

### SavedPaymentMethod Entity

```php
namespace ActionTarget\PaymentGate\Core\Content\SavedPaymentMethod;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class SavedPaymentMethodEntity extends Entity
{
    protected string $id;
    protected string $customerId;
    protected string $paymentGateToken;
    protected string $paymentMethodType;
    protected string $lastFour;
    protected ?string $cardBrand;
    protected ?int $expiryMonth;
    protected ?int $expiryYear;
    protected bool $isDefault;
    protected ?string $billingAddressId;
    protected \DateTimeInterface $createdAt;
    protected ?\DateTimeInterface $updatedAt;
    
    // Relations
    protected ?CustomerEntity $customer;
    protected ?CustomerAddressEntity $billingAddress;
}
```

### PaymentRoutingRule Entity

```php
namespace ActionTarget\PaymentGate\Core\Content\PaymentRoutingRule;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class PaymentRoutingRuleEntity extends Entity
{
    protected string $id;
    protected string $name;
    protected int $priority;
    protected ?string $customerGroupId;
    protected string $paymentMethodType;
    protected array $conditions; // JSON structure
    protected string $action; // allow, deny, route_to_manual
    protected bool $isActive;
    protected \DateTimeInterface $createdAt;
    protected ?\DateTimeInterface $updatedAt;
    
    // Relations
    protected ?CustomerGroupEntity $customerGroup;
}
```

### PaymentMessage Entity

```php
namespace ActionTarget\PaymentGate\Core\Content\PaymentMessage;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class PaymentMessageEntity extends Entity
{
    protected string $id;
    protected string $messageKey;
    protected string $paymentMethodType;
    protected string $outcomeType; // success, pending, review, declined
    protected string $title;
    protected string $message;
    protected bool $isActive;
    protected ?string $salesChannelId;
    protected \DateTimeInterface $createdAt;
    protected ?\DateTimeInterface $updatedAt;
    
    // Relations
    protected ?SalesChannelEntity $salesChannel;
}
```

### SageSyncLog Entity

```php
namespace ActionTarget\PaymentGate\Core\Content\SageSyncLog;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;

class SageSyncLogEntity extends Entity
{
    protected string $id;
    protected string $orderId;
    protected ?string $transactionId;
    protected string $syncType; // capture, refund, status_update
    protected array $sageRequest;
    protected ?array $sageResponse;
    protected string $status; // success, failed, pending
    protected ?string $errorMessage;
    protected \DateTimeInterface $createdAt;
    
    // Relations
    protected ?OrderEntity $order;
    protected ?PaymentTransactionEntity $transaction;
}
```

---

## Service Interfaces

### PaymentGateClientInterface

```php
namespace ActionTarget\PaymentGate\Service\PaymentGate;

interface PaymentGateClientInterface
{
    public function authorize(
        float $amount,
        string $currency,
        array $paymentMethod,
        array $customer,
        array $billingAddress,
        array $metadata = []
    ): AuthorizationResult;
    
    public function capture(
        string $paymentId,
        float $amount,
        array $metadata = []
    ): CaptureResult;
    
    public function refund(
        string $paymentId,
        float $amount,
        string $reason,
        array $metadata = []
    ): RefundResult;
    
    public function void(
        string $paymentId,
        string $reason,
        array $metadata = []
    ): VoidResult;
    
    public function getPaymentStatus(string $paymentId): PaymentStatus;
    
    public function createToken(
        array $cardData,
        string $customerId
    ): TokenResult;
    
    public function deleteToken(string $tokenId): bool;
}
```

### SageIntegrationServiceInterface

```php
namespace ActionTarget\PaymentGate\Service\Sage;

interface SageIntegrationServiceInterface
{
    public function syncOrderToSage(string $orderId): SyncResult;
    
    public function handleCaptureRequest(array $payload): CaptureResponse;
    
    public function syncPaymentStatus(
        string $orderId,
        string $status,
        float $amount,
        \DateTimeInterface $timestamp
    ): SyncResult;
    
    public function getShipmentDetails(string $sageOrderId): ShipmentDetails;
}
```

### PaymentRoutingServiceInterface

```php
namespace ActionTarget\PaymentGate\Service\Routing;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Customer\CustomerEntity;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

interface PaymentRoutingServiceInterface
{
    public function getAvailablePaymentMethods(
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): array;
    
    public function isPaymentMethodAllowed(
        string $paymentMethodType,
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): bool;
    
    public function getRoutingDecision(
        string $paymentMethodType,
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): RoutingDecision;
}
```

### TransactionServiceInterface

```php
namespace ActionTarget\PaymentGate\Service\Transaction;

interface TransactionServiceInterface
{
    public function createTransaction(
        string $orderId,
        string $orderTransactionId,
        string $paymentMethodType,
        float $amount,
        string $currency
    ): PaymentTransactionEntity;
    
    public function updateTransactionStatus(
        string $transactionId,
        string $status,
        array $metadata = []
    ): void;
    
    public function recordCapture(
        string $transactionId,
        float $amount,
        string $paymentGateTransactionId
    ): void;
    
    public function recordRefund(
        string $transactionId,
        float $amount,
        string $reason
    ): void;
    
    public function getTransactionByOrderId(string $orderId): ?PaymentTransactionEntity;
    
    public function getRemainingAuthorization(string $transactionId): float;
}
```

---

## Event Definitions

### PaymentAuthorizedEvent

```php
namespace ActionTarget\PaymentGate\Core\Checkout\Payment\Event;

use Symfony\Contracts\EventDispatcher\Event;

class PaymentAuthorizedEvent extends Event
{
    public const EVENT_NAME = 'action_target.payment.authorized';
    
    public function __construct(
        private readonly string $orderId,
        private readonly string $transactionId,
        private readonly float $amount,
        private readonly string $paymentGateTransactionId,
        private readonly string $authorizationCode
    ) {}
    
    // Getters...
}
```

### PaymentCaptureRequestedEvent

```php
namespace ActionTarget\PaymentGate\Core\Checkout\Payment\Event;

class PaymentCaptureRequestedEvent extends Event
{
    public const EVENT_NAME = 'action_target.payment.capture_requested';
    
    public function __construct(
        private readonly string $orderId,
        private readonly string $transactionId,
        private readonly float $captureAmount,
        private readonly ?string $shipmentId = null
    ) {}
    
    // Getters...
}
```

### PaymentCapturedEvent

```php
namespace ActionTarget\PaymentGate\Core\Checkout\Payment\Event;

class PaymentCapturedEvent extends Event
{
    public const EVENT_NAME = 'action_target.payment.captured';
    
    public function __construct(
        private readonly string $orderId,
        private readonly string $transactionId,
        private readonly float $capturedAmount,
        private readonly float $remainingAmount
    ) {}
    
    // Getters...
}
```

### SageSyncCompletedEvent

```php
namespace ActionTarget\PaymentGate\Core\System\Sage\Event;

class SageSyncCompletedEvent extends Event
{
    public const EVENT_NAME = 'action_target.sage.sync_completed';
    
    public function __construct(
        private readonly string $orderId,
        private readonly string $syncType,
        private readonly string $status,
        private readonly array $sageResponse
    ) {}
    
    // Getters...
}
```

---

## Configuration Schema

### Plugin Configuration Structure

```xml
<?xml version="1.0" encoding="UTF-8"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="https://raw.githubusercontent.com/shopware/platform/trunk/src/Core/System/SystemConfig/Schema/config.xsd">
    
    <card>
        <title>PaymentGate Credentials</title>
        <name>credentials</name>
        
        <input-field type="password">
            <name>apiKey</name>
            <label>API Key</label>
            <required>true</required>
        </input-field>
        
        <input-field type="password">
            <name>apiSecret</name>
            <label>API Secret</label>
            <required>true</required>
        </input-field>
        
        <input-field type="single-select">
            <name>environment</name>
            <label>Environment</label>
            <options>
                <option>
                    <id>sandbox</id>
                    <name>Sandbox</name>
                </option>
                <option>
                    <id>production</id>
                    <name>Production</name>
                </option>
            </options>
            <defaultValue>sandbox</defaultValue>
        </input-field>
    </card>
    
    <card>
        <title>Payment Behavior</title>
        <name>behavior</name>
        
        <input-field type="single-select">
            <name>authorizationMode</name>
            <label>Authorization Mode</label>
            <options>
                <option>
                    <id>authorize_only</id>
                    <name>Authorize Only (Default)</name>
                </option>
                <option>
                    <id>authorize_capture</id>
                    <name>Authorize and Capture</name>
                </option>
            </options>
            <defaultValue>authorize_only</defaultValue>
        </input-field>
        
        <input-field type="bool">
            <name>enableSavedCards</name>
            <label>Enable Saved Payment Methods</label>
            <defaultValue>true</defaultValue>
        </input-field>
        
        <input-field type="int">
            <name>authorizationExpiryDays</name>
            <label>Authorization Expiry (Days)</label>
            <defaultValue>7</defaultValue>
        </input-field>
    </card>
    
    <card>
        <title>Sage Integration</title>
        <name>sage</name>
        
        <input-field type="text">
            <name>apiUrl</name>
            <label>Sage API URL</label>
        </input-field>
        
        <input-field type="password">
            <name>apiKey</name>
            <label>Sage API Key</label>
        </input-field>
        
        <input-field type="bool">
            <name>enableSync</name>
            <label>Enable Sage Synchronization</label>
            <defaultValue>true</defaultValue>
        </input-field>
        
        <input-field type="int">
            <name>syncRetryAttempts</name>
            <label>Sync Retry Attempts</label>
            <defaultValue>3</defaultValue>
        </input-field>
    </card>
</config>
```

---

## Error Handling

### Exception Hierarchy

```php
namespace ActionTarget\PaymentGate\Exception;

// Base exception
class PaymentGateException extends \Exception {}

// Authorization exceptions
class AuthorizationFailedException extends PaymentGateException {}
class InsufficientFundsException extends AuthorizationFailedException {}
class CardDeclinedException extends AuthorizationFailedException {}
class InvalidCardException extends AuthorizationFailedException {}

// Capture exceptions
class CaptureFailedException extends PaymentGateException {}
class InsufficientAuthorizationException extends CaptureFailedException {}
class AuthorizationExpiredException extends CaptureFailedException {}

// Refund exceptions
class RefundFailedException extends PaymentGateException {}
class RefundAmountExceededException extends RefundFailedException {}

// Configuration exceptions
class InvalidConfigurationException extends PaymentGateException {}
class MissingCredentialsException extends InvalidConfigurationException {}

// Integration exceptions
class SageIntegrationException extends PaymentGateException {}
class SageSyncFailedException extends SageIntegrationException {}

// Validation exceptions
class PaymentValidationException extends PaymentGateException {}
class InvalidAmountException extends PaymentValidationException {}
class InvalidPaymentMethodException extends PaymentValidationException {}
```

### Error Response Format

```json
{
  "error": {
    "code": "authorization_failed",
    "message": "Payment authorization failed",
    "details": {
      "reason": "card_declined",
      "decline_code": "insufficient_funds"
    },
    "timestamp": "2026-04-07T23:00:00Z",
    "request_id": "req_abc123xyz"
  }
}
```

---

## Security Specifications

### API Authentication

**PaymentGate API**:
```php
$headers = [
    'Authorization' => 'Bearer ' . base64_encode($apiKey . ':' . $apiSecret),
    'Content-Type' => 'application/json',
    'X-API-Version' => '2024-01'
];
```

**Sage API**:
```php
$headers = [
    'X-Sage-API-Key' => $apiKey,
    'Content-Type' => 'application/json'
];
```

### Webhook Signature Verification

```php
public function verifyWebhookSignature(
    Request $request,
    string $secret
): bool {
    $payload = $request->getContent();
    $signature = $request->headers->get('X-PaymentGate-Signature');
    
    $expectedSignature = 'sha256=' . hash_hmac(
        'sha256',
        $payload,
        $secret
    );
    
    return hash_equals($expectedSignature, $signature);
}
```

### Data Encryption

```php
// Encrypt sensitive configuration values
public function encryptValue(string $value): string
{
    return openssl_encrypt(
        $value,
        'AES-256-CBC',
        $this->getEncryptionKey(),
        0,
        $this->getIV()
    );
}

// Decrypt sensitive configuration values
public function decryptValue(string $encrypted): string
{
    return openssl_decrypt(
        $encrypted,
        'AES-256-CBC',
        $this->getEncryptionKey(),
        0,
        $this->getIV()
    );
}
```

### PCI Compliance

1. **Never store**:
   - Full card numbers
   - CVV/CVC codes
   - Unencrypted card data

2. **Always use**:
   - Tokenization for saved cards
   - Hosted iframe for card entry
   - HTTPS for all communications

3. **Log sanitization**:
```php
public function sanitizeLogData(array $data): array
{
    $sensitive = ['card_number', 'cvv', 'cvc', 'password', 'api_key'];
    
    foreach ($sensitive as $field) {
        if (isset($data[$field])) {
            $data[$field] = '***REDACTED***';
        }
    }
    
    return $data;
}
```

---

## Performance Considerations

### Caching Strategy

```php
// Cache payment method availability
$cacheKey = sprintf(
    'payment_methods_%s_%s',
    $customerId ?? 'guest',
    $salesChannelId
);

$methods = $this->cache->get($cacheKey, function() {
    return $this->loadPaymentMethods();
}, 3600); // 1 hour TTL
```

### Async Processing

```php
// Queue capture requests for async processing
$this->messageBus->dispatch(
    new CapturePaymentMessage(
        $transactionId,
        $amount,
        $shipmentId
    )
);
```

### Database Indexing

```sql
-- Optimize transaction lookups
CREATE INDEX idx_order_id ON action_target_payment_transaction(order_id);
CREATE INDEX idx_status ON action_target_payment_transaction(status);
CREATE INDEX idx_created_at ON action_target_payment_transaction(created_at);

-- Optimize saved payment method lookups
CREATE INDEX idx_customer_id ON action_target_saved_payment_method(customer_id);
CREATE INDEX idx_is_default ON action_target_saved_payment_method(is_default);
```

---

## Conclusion

This technical specification provides the detailed contracts and structures needed to implement the PaymentGate plugin. All API endpoints, data models, and service interfaces are defined to ensure consistent implementation across the codebase.

For implementation details and step-by-step guidance, refer to the [Implementation Guide](IMPLEMENTATION_GUIDE.md).