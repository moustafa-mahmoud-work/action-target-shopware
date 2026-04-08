# Storefront Integration Guide

Complete guide for the Action Target PaymentGate storefront integration.

## Overview

The storefront integration provides a seamless, PCI-compliant checkout experience with support for:
- Credit card payments via secure iframe
- Net 30 payment terms
- Saved payment methods
- Real-time validation
- Mobile-responsive design

## Architecture

### Components

```
Storefront Integration
├── Page Loaders
│   └── CheckoutConfirmPaymentPageLoader - Extends checkout with payment data
├── Controllers
│   └── PaymentController - Handles AJAX payment requests
├── Templates (Twig)
│   ├── confirm-payment.html.twig - Main checkout extension
│   ├── credit-card-form.html.twig - Card entry with iframe
│   ├── net30-info.html.twig - Net 30 terms display
│   └── saved-payment-methods.html.twig - Saved cards management
└── JavaScript
    ├── payment-handler.js - Main payment logic
    ├── card-iframe-handler.js - Secure card entry
    └── payment-validation.js - Client-side validation
```

## Checkout Flow

### 1. Customer Selects Payment Method

```
Customer arrives at checkout
    ↓
Payment methods displayed
    ↓
Customer selects payment method
    ↓
Payment-specific form loads
```

### 2. Credit Card Flow

```
Customer selects credit card
    ↓
Secure iframe loads for card entry
    ↓
Customer enters card details in iframe
    ↓
Iframe tokenizes card (PCI-compliant)
    ↓
Token sent to parent page
    ↓
Customer submits order
    ↓
Payment handler processes with token
    ↓
Order created with authorized status
```

### 3. Net 30 Flow

```
Customer selects Net 30
    ↓
Eligibility checked
    ↓
Terms displayed
    ↓
Customer accepts terms
    ↓
Order created with authorized status
    ↓
Invoice sent to customer
```

## Implementation Details

### Page Loader

**CheckoutConfirmPaymentPageLoader.php**

Extends the checkout confirm page with payment-specific data:

```php
public function onCheckoutConfirmLoaded(CheckoutConfirmPageLoadedEvent $event): void
{
    // Load saved payment methods
    $savedPaymentMethods = $this->savedPaymentMethodService
        ->getCustomerPaymentMethods($customerId, $context);
    
    // Add to page extensions
    $page->addExtension('actionTargetSavedPaymentMethods', $savedPaymentMethods);
    $page->addExtension('actionTargetPaymentConfig', $paymentConfig);
}
```

### Payment Controller

**PaymentController.php**

Handles AJAX requests for:

1. **Payment Validation** (`/action-target/payment/validate`)
   - Validates payment method eligibility
   - Checks customer credit limits (Net 30)
   - Returns validation result

2. **Card Tokenization** (`/action-target/payment/tokenize`)
   - Receives card data from iframe
   - Tokenizes via PaymentGate API
   - Returns secure token

3. **Save Payment Method** (`/action-target/payment/save-method`)
   - Saves card for future use
   - Stores only non-sensitive data
   - Links to customer account

4. **Delete Payment Method** (`/action-target/payment/delete-method/{id}`)
   - Removes saved payment method
   - Validates ownership
   - Updates PaymentGate

### Iframe Integration

**Security Features:**

1. **Origin Verification**
   ```javascript
   window.addEventListener('message', (event) => {
       // Verify origin in production
       if (event.origin !== 'https://secure.paymentgate.com') return;
       // Process message
   });
   ```

2. **Token-Based Communication**
   - Card data never touches merchant server
   - Only tokens are transmitted
   - PCI DSS Level 1 compliant

3. **Message Types**
   ```javascript
   // From iframe to parent
   { type: 'cardReady' }           // Iframe loaded
   { type: 'cardToken', token: '...' }  // Token generated
   { type: 'cardError', message: '...' } // Validation error
   
   // From parent to iframe
   { type: 'tokenize' }            // Request tokenization
   { type: 'configure', config: {} }    // Send configuration
   ```

### JavaScript Modules

**payment-handler.js**
- Main payment orchestration
- Form submission handling
- Payment method switching
- Error display

**card-iframe-handler.js**
- Iframe communication
- Token management
- Loading states
- Error handling

**payment-validation.js**
- Client-side validation
- Card number validation (Luhn)
- Expiry validation
- CVV validation

## Templates

### Main Checkout Template

**confirm-payment.html.twig**

Extends Shopware's checkout confirm page:

```twig
{% sw_extends '@Storefront/storefront/page/checkout/confirm/index.html.twig' %}

{% block page_checkout_confirm_payment %}
    {{ parent() }}
    
    {# Add payment-specific content #}
    {% if page.extension('actionTargetPaymentConfig') %}
        <div class="action-target-payment-container">
            {# Payment forms loaded here #}
        </div>
    {% endif %}
{% endblock %}
```

### Credit Card Form

**credit-card-form.html.twig**

Features:
- Saved card selection dropdown
- Secure iframe for new cards
- Cardholder name input
- Save card checkbox
- Real-time validation
- Loading indicators

### Net 30 Info

**net30-info.html.twig**

Displays:
- Payment terms (30 days)
- Due date calculation
- Order total
- Late payment warning
- Terms acceptance

### Saved Payment Methods

**saved-payment-methods.html.twig**

Features:
- List of saved cards
- Card brand icons
- Last 4 digits display
- Expiry date
- Delete functionality
- AJAX deletion

## Styling

### Bootstrap 5 Classes

The templates use Bootstrap 5 for styling:

```html
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Payment</h5>
        <div class="alert alert-info">
            <i class="bi bi-shield-check"></i>
            Secure payment
        </div>
    </div>
</div>
```

### Custom CSS

Add custom styles in:
```
src/Resources/app/storefront/src/scss/payment.scss
```

## API Endpoints

### Validate Payment
```
POST /action-target/payment/validate
Content-Type: application/json

{
    "paymentMethod": "credit_card"
}

Response:
{
    "success": true,
    "error": null,
    "data": {...}
}
```

### Tokenize Card
```
POST /action-target/payment/tokenize
Content-Type: application/json

{
    "cardNumber": "4111111111111111",
    "expMonth": "12",
    "expYear": "2025",
    "cvv": "123",
    "cardholderName": "John Doe"
}

Response:
{
    "success": true,
    "token": "tok_abc123...",
    "last4": "1111",
    "brand": "visa"
}
```

### Save Payment Method
```
POST /action-target/payment/save-method
Content-Type: application/json

{
    "type": "card",
    "token": "tok_abc123...",
    "last4": "1111",
    "brand": "visa",
    "expMonth": "12",
    "expYear": "2025"
}

Response:
{
    "success": true,
    "paymentMethodId": "pm_xyz789..."
}
```

### Delete Payment Method
```
DELETE /action-target/payment/delete-method/{id}

Response:
{
    "success": true
}
```

## Testing

### Local Testing

1. **Install Plugin**
   ```bash
   php bin/console plugin:install ActionTargetPaymentGate --activate
   php bin/console cache:clear
   ```

2. **Configure Plugin**
   - Navigate to Settings → Plugins
   - Configure API credentials
   - Enable test mode

3. **Test Checkout**
   - Add product to cart
   - Proceed to checkout
   - Select payment method
   - Complete order

### Test Cards

For testing in sandbox mode:

```
Visa Success: 4111 1111 1111 1111
Visa Decline: 4000 0000 0000 0002
Mastercard: 5555 5555 5555 4444
Amex: 3782 822463 10005

CVV: Any 3 digits (4 for Amex)
Expiry: Any future date
```

### Browser Testing

Test in:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Troubleshooting

### Iframe Not Loading

**Problem:** Card entry iframe doesn't load

**Solutions:**
1. Check iframe URL in configuration
2. Verify CORS settings
3. Check browser console for errors
4. Ensure HTTPS in production

### Token Not Generated

**Problem:** Card token not received

**Solutions:**
1. Check postMessage origin verification
2. Verify iframe communication
3. Check network tab for API calls
4. Review browser console logs

### Payment Method Not Showing

**Problem:** Payment method not visible at checkout

**Solutions:**
1. Verify plugin is activated
2. Check payment method is assigned to sales channel
3. Clear cache
4. Check payment handler registration

### Saved Cards Not Loading

**Problem:** Saved payment methods don't appear

**Solutions:**
1. Verify customer is logged in
2. Check SavedPaymentMethodService
3. Review database for saved methods
4. Check page loader registration

## Security Considerations

### PCI Compliance

1. **Never Store Card Data**
   - Use tokens only
   - Iframe handles sensitive data
   - No card data in logs

2. **HTTPS Required**
   - All production traffic over HTTPS
   - Secure cookie flags
   - HSTS headers

3. **Input Validation**
   - Server-side validation
   - Client-side validation
   - Sanitize all inputs

4. **Access Control**
   - Verify customer ownership
   - Check permissions
   - Validate sessions

## Performance

### Optimization Tips

1. **Lazy Load Iframe**
   ```javascript
   // Load iframe only when payment method selected
   if (paymentMethod === 'credit_card') {
       loadCardIframe();
   }
   ```

2. **Cache Saved Methods**
   ```php
   // Cache customer's saved methods
   $cache->get('saved_methods_' . $customerId);
   ```

3. **Minimize JavaScript**
   ```bash
   npm run build:js
   ```

4. **Optimize Images**
   - Use SVG for card brand icons
   - Compress images
   - Use lazy loading

## Next Steps

1. ✅ Storefront integration complete
2. → Test end-to-end checkout flow
3. → Configure production API credentials
4. → Deploy to staging environment
5. → Perform security audit
6. → Load testing
7. → Production deployment

---

**@Author Moustafa M S** 🤖