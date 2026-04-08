# Action Target PaymentGate Plugin - Implementation Guide

## Overview
This guide provides step-by-step instructions for implementing the PaymentGate plugin for Shopware 6.7. It's organized into phases that can be developed and tested incrementally.

## Prerequisites

### Development Environment
- PHP 8.2 or higher
- Composer 2.x
- MySQL 8.0 or MariaDB 10.11
- Node.js 18+ and npm (for admin panel)
- Shopware 6.7.8.2 installed and running

### Knowledge Requirements
- Shopware 6 plugin development
- Symfony framework
- Payment gateway integration
- Vue.js 3 (for admin panel)

## Implementation Phases

### Phase 1: Plugin Foundation (Week 1)
**Goal**: Create the basic plugin structure and register it with Shopware.

#### Tasks
1. Create plugin directory structure
2. Implement main plugin class
3. Create composer.json
4. Register payment methods
5. Create basic configuration

#### Deliverables
- Plugin loads successfully
- Appears in Shopware admin
- Basic configuration accessible

---

### Phase 2: Database Schema
**Goal**: Implement all required database tables and entities.

#### Tasks
1. Create migration files for all custom tables
2. Implement entity classes
3. Create repository classes
4. Set up entity definitions

#### Key Tables
- `action_target_payment_transaction`
- `action_target_saved_payment_method`
- `action_target_payment_routing_rule`
- `action_target_payment_message`
- `action_target_sage_sync_log`

#### Deliverables
- All migrations run successfully
- Entities accessible via DAL
- Database schema documented

---

### Phase 3: Credit Card Payment Handler 
**Goal**: Implement core credit card payment functionality.

#### Tasks
1. Create `AbstractPaymentGateHandler` base class
2. Implement `CreditCardHandler`
3. Create `PaymentGateClient` service
4. Implement authorization flow
5. Add transaction logging

#### Key Components
```php
// Payment handler interface
interface PaymentHandlerInterface
{
    public function pay(
        AsyncPaymentTransactionStruct $transaction,
        RequestDataBag $dataBag,
        SalesChannelContext $context
    ): RedirectResponse;
    
    public function finalize(
        AsyncPaymentTransactionStruct $transaction,
        Request $request,
        SalesChannelContext $context
    ): void;
}

// Base handler with common logic
abstract class AbstractPaymentGateHandler implements PaymentHandlerInterface
{
    protected function createTransaction(...): PaymentTransaction;
    protected function logTransaction(...): void;
    protected function handleError(...): void;
}
```

#### Deliverables
- Credit card authorization works
- Transactions logged to database
- Error handling implemented

---

### Phase 4: Storefront Integration 
**Goal**: Create customer-facing checkout experience.

#### Tasks
1. Create checkout payment page loader
2. Implement payment controller
3. Build iframe integration for card entry
4. Add payment method validation
5. Create custom Twig templates

#### Key Files
- `CheckoutPaymentPageLoader.php`
- `PaymentController.php`
- `checkout/confirm-payment.html.twig`
- `component/payment/payment-method-iframe.html.twig`

#### Storefront Flow
```
Customer selects payment method
    ↓
Payment method validation
    ↓
Iframe loads for card entry (if credit card)
    ↓
Customer submits payment
    ↓
Authorization request to PaymentGate
    ↓
Order placed with authorized status
    ↓
Confirmation page with payment status
```

#### Deliverables
- Checkout flow works end-to-end
- PCI-compliant card entry
- Order created with payment authorization

---

### Phase 5: Saved Payment Methods 
**Goal**: Allow customers to save and reuse payment methods.

#### Tasks
1. Implement tokenization service
2. Create saved payment method CRUD
3. Build account area UI
4. Add default payment method logic
5. Implement security measures

#### Key Components
```php
class SavedPaymentMethodService
{
    public function savePaymentMethod(
        string $customerId,
        string $token,
        array $metadata
    ): SavedPaymentMethod;
    
    public function getCustomerPaymentMethods(
        string $customerId
    ): SavedPaymentMethodCollection;
    
    public function deletePaymentMethod(
        string $id,
        string $customerId
    ): void;
    
    public function setDefaultPaymentMethod(
        string $id,
        string $customerId
    ): void;
}
```

#### Deliverables
- Customers can save cards
- Saved cards appear in account area
- Saved cards usable at checkout
- Secure token storage

---

### Phase 6: Capture and Refund (Week 5-6)
**Goal**: Implement post-authorization payment operations.

#### Tasks
1. Create capture service
2. Implement refund service
3. Add partial capture support
4. Build admin capture UI
5. Implement status synchronization

#### Capture Flow
```
Sage triggers capture request
    ↓
Webhook received in Shopware
    ↓
Validate shipment details
    ↓
Calculate capture amount
    ↓
Call PaymentGate capture API
    ↓
Update transaction status
    ↓
Sync status back to Sage
    ↓
Update order payment status
```

#### Key Services
```php
class PaymentGateCaptureService
{
    public function capturePayment(
        string $transactionId,
        float $amount,
        ?string $shipmentId = null
    ): CaptureResult;
    
    public function capturePartial(
        string $transactionId,
        float $amount,
        string $shipmentId
    ): CaptureResult;
}

class PaymentGateRefundService
{
    public function refundPayment(
        string $transactionId,
        float $amount,
        string $reason
    ): RefundResult;
}
```

#### Deliverables
- Capture works from admin
- Partial captures supported
- Refunds processed correctly
- Status updates reflected

---

### Phase 7: Sage Integration 
**Goal**: Implement bidirectional integration with Sage.

#### Tasks
1. Create Sage API client
2. Implement webhook handlers
3. Build synchronization service
4. Add retry logic for failed syncs
5. Create sync status dashboard

#### Integration Points
```php
class SageIntegrationService
{
    // Shopware → Sage
    public function syncOrderToSage(string $orderId): void;
    public function syncPaymentStatus(string $transactionId): void;
    
    // Sage → Shopware
    public function handleCaptureRequest(array $payload): void;
    public function handleRefundRequest(array $payload): void;
    public function handleStatusUpdate(array $payload): void;
}

class SageWebhookHandler
{
    public function handleWebhook(Request $request): Response;
    protected function validateSignature(Request $request): bool;
    protected function processPayload(array $payload): void;
}
```

#### Webhook Security
- Signature validation
- IP whitelist (optional)
- Request logging
- Replay attack prevention

#### Deliverables
- Sage can trigger captures
- Status syncs bidirectionally
- Webhook security implemented
- Sync failures logged and retried

---

### Phase 8: Alternative Payment Method
**Goal**: Implement Net 30, wire transfer, and ACH handlers.

#### Tasks
1. Implement `Net30Handler`
2. Implement `WireTransferHandler`
3. Create `AchHandler` (future-ready)
4. Add payment routing logic
5. Build admin review queue

#### Net 30 Implementation
```php
class Net30Handler extends AbstractPaymentGateHandler
{
    public function pay(...): RedirectResponse
    {
        // Validate customer eligibility
        if (!$this->isEligibleForNet30($customer)) {
            throw new PaymentException('Not eligible for Net 30');
        }
        
        // Check credit limit
        if (!$this->checkCreditLimit($customer, $amount)) {
            throw new PaymentException('Credit limit exceeded');
        }
        
        // Create pending invoice
        $this->createPendingInvoice($order);
        
        // No immediate payment transaction
        return new RedirectResponse($returnUrl);
    }
}
```

#### Wire Transfer Flow
```
Customer selects wire transfer
    ↓
Order placed with "pending payment" status
    ↓
Customer receives wire instructions
    ↓
Admin marks as paid when wire received
    ↓
Order status updated to "paid"
    ↓
Fulfillment proceeds
```

#### Deliverables
- Net 30 works for eligible customers
- Wire transfer creates manual review
- ACH handler structure ready
- Payment routing functional

---

### Phase 9: Payment Routing & Rules 
**Goal**: Implement intelligent payment method routing.

#### Tasks
1. Create routing rule engine
2. Implement customer group rules
3. Add geographic restrictions
4. Build amount-based routing
5. Create admin rule management UI

#### Routing Logic
```php
class PaymentRoutingService
{
    public function getAvailablePaymentMethods(
        Customer $customer,
        Cart $cart,
        SalesChannelContext $context
    ): PaymentMethodCollection {
        $rules = $this->getRulesForContext($customer, $cart);
        $methods = $this->getAllPaymentMethods();
        
        foreach ($rules as $rule) {
            $methods = $this->applyRule($rule, $methods, $context);
        }
        
        return $methods;
    }
    
    protected function applyRule(
        RoutingRule $rule,
        PaymentMethodCollection $methods,
        SalesChannelContext $context
    ): PaymentMethodCollection {
        // Apply rule conditions and actions
    }
}
```

#### Rule Examples
- B2B customers see Net 30
- International orders route to wire transfer
- Orders > $10,000 require manual review
- Specific customer groups get ACH

#### Deliverables
- Payment methods filtered by rules
- Admin can create/edit rules
- Rules apply at checkout
- Rule priority system works

---

### Phase 10: Admin Panel 
**Goal**: Create comprehensive admin interface.

#### Tasks
1. Build payment dashboard
2. Create transaction detail view
3. Implement customer payment method management
4. Add manual payment actions
5. Create reporting views

#### Admin Features

**Payment Dashboard**
- Transaction list with filters
- Status overview
- Quick actions (capture, refund)
- Search functionality

**Transaction Detail**
- Full transaction history
- Related order information
- Payment method details
- Action buttons (capture, refund, void)
- Sage sync status

**Customer Payment Methods**
- View all saved methods
- Delete methods
- View usage history

**Configuration**
- PaymentGate credentials
- Sage integration settings
- Payment method toggles
- Routing rules

#### Vue.js Components
```javascript
// Transaction list component
{
  name: 'at-payment-transaction-list',
  data() {
    return {
      transactions: [],
      filters: {},
      isLoading: false
    }
  },
  methods: {
    loadTransactions() { },
    capturePayment(id) { },
    refundPayment(id) { }
  }
}
```

#### Deliverables
- Admin can view all transactions
- Manual capture/refund works
- Customer payment methods manageable
- Configuration UI functional

---

### Phase 11: Customer Messaging 
**Goal**: Implement editable customer-facing messages.

#### Tasks
1. Create message template system
2. Build message editor UI
3. Implement message rendering
4. Add multi-language support
5. Create default message set

#### Message System
```php
class PaymentMessageService
{
    public function getMessage(
        string $messageKey,
        string $paymentMethodType,
        ?string $salesChannelId = null
    ): ?PaymentMessage;
    
    public function renderMessage(
        PaymentMessage $message,
        array $variables = []
    ): string;
}
```

#### Message Types
- Payment authorized
- Payment captured
- Payment declined
- Manual review required
- Wire transfer instructions
- Net 30 terms
- Refund processed

#### Deliverables
- Messages editable in admin
- Messages display at checkout
- Variables replaced correctly
- Multi-language support

---

### Phase 12: Multi-Shipment Support 
**Goal**: Handle orders with multiple shipments.

#### Tasks
1. Track partial captures per shipment
2. Calculate remaining authorization
3. Update order status progressively
4. Display shipment-payment mapping
5. Handle edge cases

#### Multi-Shipment Logic
```php
class MultiShipmentCaptureService
{
    public function captureForShipment(
        string $orderId,
        string $shipmentId,
        float $shipmentAmount
    ): CaptureResult {
        $transaction = $this->getOrderTransaction($orderId);
        $capturedAmount = $this->getCapturedAmount($transaction);
        $authorizedAmount = $transaction->getAmount();
        
        // Validate remaining authorization
        if ($capturedAmount + $shipmentAmount > $authorizedAmount) {
            throw new InsufficientAuthorizationException();
        }
        
        // Capture for this shipment
        $result = $this->captureService->capturePartial(
            $transaction->getId(),
            $shipmentAmount,
            $shipmentId
        );
        
        // Update order status if fully captured
        if ($this->isFullyCaptured($transaction)) {
            $this->updateOrderStatus($orderId, 'paid');
        }
        
        return $result;
    }
}
```

#### Deliverables
- Partial captures work correctly
- Order status updates appropriately
- Shipment-payment mapping visible
- Edge cases handled

---

### Phase 13: Logging & Audit Trail 
**Goal**: Implement comprehensive logging system.

#### Tasks
1. Create transaction logger
2. Implement audit trail
3. Add API request/response logging
4. Build log viewer in admin
5. Set up log rotation

#### Logging Strategy
```php
class TransactionLogger
{
    public function logAuthorization(
        string $transactionId,
        array $request,
        array $response
    ): void;
    
    public function logCapture(
        string $transactionId,
        float $amount,
        array $response
    ): void;
    
    public function logError(
        string $transactionId,
        \Throwable $exception
    ): void;
    
    public function logSageSync(
        string $transactionId,
        string $syncType,
        array $data
    ): void;
}
```

#### What to Log
- All API requests/responses
- Payment state changes
- Admin actions
- Sage sync events
- Errors and exceptions
- Customer actions (save card, etc.)

#### Deliverables
- All payment actions logged
- Logs viewable in admin
- Log retention policy implemented
- Performance impact minimal

---

### Phase 14: Testing 
**Goal**: Comprehensive test coverage.

#### Test Categories

**Unit Tests**
- Payment handler logic
- Routing rules engine
- Amount calculations
- Message rendering
- Validation logic

**Integration Tests**
- Database operations
- API client mocking
- Event dispatching
- Service interactions

**E2E Tests**
- Complete checkout flow
- Saved card usage
- Capture from admin
- Refund processing
- Multi-shipment scenarios

#### Test Structure
```php
// Unit test example
class CreditCardHandlerTest extends TestCase
{
    public function testAuthorizationSuccess(): void
    {
        $handler = new CreditCardHandler(/* deps */);
        $result = $handler->pay($transaction, $dataBag, $context);
        
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals('authorized', $transaction->getStatus());
    }
}

// Integration test example
class PaymentGateClientTest extends TestCase
{
    public function testAuthorizePayment(): void
    {
        $client = $this->createClient();
        $result = $client->authorize($amount, $cardData);
        
        $this->assertTrue($result->isSuccess());
        $this->assertNotEmpty($result->getTransactionId());
    }
}
```

#### Deliverables
- 80%+ code coverage
- All critical paths tested
- E2E scenarios pass
- Test documentation

---

### Phase 15: Documentation 
**Goal**: Complete documentation for all stakeholders.

#### Documentation Types

**Technical Documentation**
- API integration guide
- Database schema reference
- Event system documentation
- Extension guide

**Admin User Guide**
- Configuration setup
- Payment management
- Customer service workflows
- Troubleshooting

**Developer Guide**
- Plugin architecture
- Custom payment handler creation
- Testing guide
- Deployment procedures

**Customer Documentation**
- Payment method information
- Saved card management
- FAQ

#### Deliverables
- All documentation complete
- Screenshots included
- Examples provided
- Searchable format

---

### Phase 16: Deployment & Launch 
**Goal**: Deploy to production successfully.

#### Pre-Launch Checklist
- [ ] All tests passing
- [ ] Documentation complete
- [ ] Configuration validated
- [ ] PaymentGate credentials configured
- [ ] Sage integration tested
- [ ] Backup procedures in place
- [ ] Rollback plan ready
- [ ] Monitoring configured
- [ ] Support team trained

#### Deployment Steps
1. Deploy to staging environment
2. Run full test suite
3. Perform UAT with stakeholders
4. Fix any issues found
5. Deploy to production during maintenance window
6. Run smoke tests
7. Monitor for 24 hours
8. Gradual rollout if possible

#### Post-Launch Monitoring
- Transaction success rates
- API response times
- Error rates
- Sage sync status
- Customer support tickets

#### Deliverables
- Plugin deployed to production
- Monitoring active
- Support team ready
- Launch successful

---

## Development Best Practices

### Code Standards
- Follow Shopware coding standards
- Use type hints everywhere
- Document all public methods
- Write self-documenting code
- Keep methods small and focused

### Security
- Never store raw card data
- Validate all inputs
- Use parameterized queries
- Implement CSRF protection
- Log security events

### Performance
- Use caching where appropriate
- Optimize database queries
- Lazy load when possible
- Monitor API response times
- Profile critical paths

### Error Handling
- Use specific exception types
- Log all errors
- Provide helpful error messages
- Implement retry logic
- Graceful degradation

## Common Pitfalls to Avoid

1. **Storing Card Data**: Never store raw card numbers or CVV
2. **Synchronous Captures**: Use async processing for captures
3. **Missing Validation**: Always validate payment amounts
4. **Poor Error Messages**: Provide actionable error messages
5. **No Logging**: Log everything for debugging
6. **Hardcoded Values**: Use configuration for all settings
7. **Missing Tests**: Test edge cases thoroughly
8. **No Rollback Plan**: Always have a rollback strategy

## Support & Maintenance

### Monitoring
- Set up alerts for failed transactions
- Monitor API availability
- Track sync failures
- Watch error rates

### Maintenance Tasks
- Review logs weekly
- Update dependencies monthly
- Audit security quarterly
- Performance review quarterly

### Support Procedures
- Document common issues
- Create troubleshooting guides
- Maintain FAQ
- Track support tickets

## Success Metrics

### Technical Metrics
- Transaction success rate > 99%
- API response time < 500ms
- Zero PCI compliance violations
- Test coverage > 80%

### Business Metrics
- Payment method adoption rates
- Customer satisfaction scores
- Support ticket volume
- Order completion rates

## Conclusion

This implementation guide provides a structured approach to building the PaymentGate plugin. Follow the phases sequentially, test thoroughly at each stage, and maintain clear documentation throughout the process.

Remember: The goal is not just to build a payment plugin, but to create a robust, secure, and maintainable system that supports Action Target's complex business requirements.