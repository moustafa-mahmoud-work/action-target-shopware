# Payment Routing Rules - Examples and Usage

## Overview

The Payment Routing Service provides intelligent payment method filtering based on business rules. This document provides practical examples of how to configure and use routing rules.

## Rule Structure

Each routing rule consists of:
- **Name**: Descriptive name for the rule
- **Priority**: Higher priority rules are evaluated first (e.g., 100, 90, 80)
- **Conditions**: JSON object defining when the rule applies
- **Action**: What to do when conditions are met (`allow`, `deny`, `route_to_manual`, `require_approval`)
- **Payment Method Type**: Which payment method the action applies to
- **Is Active**: Whether the rule is currently enabled

## Example Rules

### Example 1: B2B Customers Get Net 30

**Business Requirement**: Only B2B customers with approved credit should see Net 30 payment option.

```json
{
  "name": "Enable Net 30 for B2B Customers",
  "priority": 100,
  "payment_method_type": "Net30Handler",
  "action": "allow",
  "conditions": {
    "customer_group": ["b2b_customers"],
    "customer_tags": ["net30_approved"],
    "customer_credit_limit": 5000.00
  },
  "is_active": true
}
```

**How it works**:
- Checks if customer is in "b2b_customers" group
- Verifies customer has "net30_approved" tag
- Ensures customer has at least $5,000 credit limit
- If all conditions met, Net 30 payment method is available

---

### Example 2: International Orders Use Wire Transfer

**Business Requirement**: Orders shipping to non-US/Canada countries must use wire transfer.

```json
{
  "name": "International Orders - Wire Transfer Only",
  "priority": 95,
  "payment_method_type": "WireTransferHandler",
  "action": "allow",
  "conditions": {
    "countries": ["GB", "DE", "FR", "AU", "JP"]
  },
  "is_active": true
}
```

**Companion Rule** (deny credit card for international):
```json
{
  "name": "International Orders - No Credit Card",
  "priority": 94,
  "payment_method_type": "CreditCardHandler",
  "action": "deny",
  "conditions": {
    "countries": ["GB", "DE", "FR", "AU", "JP"]
  },
  "is_active": true
}
```

---

### Example 3: Large Orders Require Manual Review

**Business Requirement**: Orders over $10,000 need manual approval before processing.

```json
{
  "name": "Large Orders Manual Review",
  "priority": 90,
  "payment_method_type": "CreditCardHandler",
  "action": "route_to_manual",
  "conditions": {
    "min_amount": 10000.00
  },
  "is_active": true
}
```

**Result**: Credit card payments over $10,000 are flagged for manual review in admin panel.

---

### Example 4: Guest Checkout Restrictions

**Business Requirement**: Guest customers can only use credit card, not Net 30 or ACH.

```json
{
  "name": "Guest Checkout - Credit Card Only",
  "priority": 85,
  "payment_method_type": "Net30Handler",
  "action": "deny",
  "conditions": {
    "is_guest": true
  },
  "is_active": true
}
```

```json
{
  "name": "Guest Checkout - No ACH",
  "priority": 85,
  "payment_method_type": "AchHandler",
  "action": "deny",
  "conditions": {
    "is_guest": true
  },
  "is_active": true
}
```

---

### Example 5: High-Value Electronics Require Approval

**Business Requirement**: Orders containing electronics over $5,000 need approval.

```json
{
  "name": "High-Value Electronics Approval",
  "priority": 80,
  "payment_method_type": "CreditCardHandler",
  "action": "require_approval",
  "conditions": {
    "min_amount": 5000.00,
    "cart_contains_category": ["electronics", "computers"]
  },
  "is_active": true
}
```

---

### Example 6: VIP Customers - All Payment Methods

**Business Requirement**: VIP customers should have access to all payment methods regardless of other rules.

```json
{
  "name": "VIP Customers - All Methods Available",
  "priority": 150,
  "payment_method_type": null,
  "action": "allow",
  "conditions": {
    "customer_tags": ["vip_customer"]
  },
  "is_active": true
}
```

**Note**: Set priority very high (150) so it overrides other restrictive rules.

---

### Example 7: Amount-Based Payment Method Routing

**Business Requirement**: 
- Orders under $100: Credit card only
- Orders $100-$5,000: Credit card or Net 30
- Orders over $5,000: Wire transfer or Net 30

```json
{
  "name": "Small Orders - Credit Card Only",
  "priority": 70,
  "payment_method_type": "CreditCardHandler",
  "action": "allow",
  "conditions": {
    "max_amount": 100.00
  },
  "is_active": true
}
```

```json
{
  "name": "Large Orders - No Credit Card",
  "priority": 75,
  "payment_method_type": "CreditCardHandler",
  "action": "deny",
  "conditions": {
    "min_amount": 5000.00
  },
  "is_active": true
}
```

---

## Condition Types Reference

### Customer Conditions

| Condition | Type | Description | Example |
|-----------|------|-------------|---------|
| `customer_group` | array | Customer group IDs or names | `["b2b_customers", "wholesale"]` |
| `customer_tags` | array | Required customer tags | `["net30_approved", "verified"]` |
| `customer_credit_limit` | float | Minimum credit limit | `10000.00` |
| `is_guest` | boolean | Is guest checkout | `true` or `false` |

### Cart Conditions

| Condition | Type | Description | Example |
|-----------|------|-------------|---------|
| `min_amount` | float | Minimum cart total | `1000.00` |
| `max_amount` | float | Maximum cart total | `50000.00` |
| `cart_contains_category` | array | Product category IDs | `["electronics", "firearms"]` |

### Geographic Conditions

| Condition | Type | Description | Example |
|-----------|------|-------------|---------|
| `countries` | array | ISO country codes | `["US", "CA", "MX"]` |

---

## Action Types Reference

| Action | Description | Use Case |
|--------|-------------|----------|
| `allow` | Keep only this payment method | Restrict to specific method |
| `deny` | Remove this payment method | Block specific method |
| `route_to_manual` | Flag for manual review | High-risk orders |
| `require_approval` | Require admin approval | Special authorization needed |

---

## Rule Priority Best Practices

1. **VIP/Exception Rules**: 150-200 (highest priority)
2. **Security/Compliance Rules**: 100-149
3. **Business Logic Rules**: 50-99
4. **Default/Fallback Rules**: 1-49

**Example Priority Hierarchy**:
```
200: VIP customers bypass all restrictions
150: Fraud prevention rules
100: B2B Net 30 eligibility
90: Large order manual review
80: International shipping rules
50: Guest checkout restrictions
10: Default payment method availability
```

---

## Testing Rules

### Test Scenario 1: B2B Customer with Net 30

**Setup**:
- Customer in "b2b_customers" group
- Has "net30_approved" tag
- Credit limit: $10,000
- Cart total: $2,500

**Expected Result**: Net 30 payment method available

---

### Test Scenario 2: Guest with Large Order

**Setup**:
- Guest checkout (no customer account)
- Cart total: $15,000

**Expected Result**: 
- Credit card available but flagged for manual review
- Net 30 not available (guest restriction)

---

### Test Scenario 3: International B2B Order

**Setup**:
- B2B customer with Net 30 approval
- Shipping to Germany
- Cart total: $8,000

**Expected Result**:
- Wire transfer available
- Net 30 available (B2B approved)
- Credit card denied (international rule)

---

## Database Schema for Rules

```sql
CREATE TABLE `action_target_payment_routing_rule` (
  `id` BINARY(16) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `priority` INT NOT NULL DEFAULT 50,
  `customer_group_id` BINARY(16) NULL,
  `payment_method_type` VARCHAR(255) NULL,
  `conditions` JSON NOT NULL,
  `action` VARCHAR(50) NOT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME(3) NOT NULL,
  `updated_at` DATETIME(3) NULL,
  PRIMARY KEY (`id`),
  KEY `idx_priority` (`priority`),
  KEY `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

---

## Admin UI Integration

### Creating a Rule via Admin Panel

1. Navigate to **Settings** → **Payment Routing Rules**
2. Click **Add Rule**
3. Fill in:
   - **Name**: Descriptive name
   - **Priority**: Number (higher = evaluated first)
   - **Payment Method**: Select from dropdown
   - **Action**: Choose action type
   - **Conditions**: Use JSON editor or form builder
4. Toggle **Active** switch
5. Click **Save**

### Rule Management Features

- **List View**: See all rules with priority, status, and quick actions
- **Drag-and-Drop**: Reorder rules by priority
- **Bulk Actions**: Enable/disable multiple rules
- **Test Mode**: Preview which payment methods would show for test scenarios
- **Audit Log**: Track rule changes and who made them

---

## API Usage

### Get Available Payment Methods

```php
use ActionTarget\PaymentGate\Service\Routing\PaymentRoutingService;

// In your controller or service
$availableMethods = $this->paymentRoutingService->getAvailablePaymentMethods(
    $customer,
    $cart,
    $context
);

foreach ($availableMethods as $method) {
    // Check if manual review required
    $customFields = $method->getCustomFields() ?? [];
    if ($customFields['requires_manual_review'] ?? false) {
        // Handle manual review flag
    }
}
```

---

## Common Patterns

### Pattern 1: Tiered Payment Options

```
Priority 100: VIP customers → All methods
Priority 90: B2B approved → Net 30 + Credit Card
Priority 80: B2B not approved → Credit Card only
Priority 70: B2C customers → Credit Card only
Priority 60: Guest → Credit Card only
```

### Pattern 2: Risk-Based Routing

```
Priority 100: High-risk countries → Wire transfer only
Priority 90: Large orders → Manual review
Priority 80: New customers → Credit card with approval
Priority 70: Established customers → All methods
```

### Pattern 3: Product-Based Routing

```
Priority 100: Firearms → Special payment methods
Priority 90: Electronics > $5k → Approval required
Priority 80: Hazmat items → Wire transfer only
Priority 70: Standard products → All methods
```

---

## Troubleshooting

### Issue: Payment method not showing

**Check**:
1. Is the payment method active in Shopware?
2. Are there deny rules blocking it?
3. Do conditions match customer/cart?
4. Is rule priority correct?

### Issue: Wrong payment method showing

**Check**:
1. Rule priority order
2. Condition logic (AND vs OR)
3. Customer group assignments
4. Custom field values

### Issue: Manual review not triggering

**Check**:
1. Action is set to `route_to_manual`
2. Custom field is being checked in payment handler
3. Admin notification system is configured

---

## Best Practices

1. **Start Simple**: Begin with basic rules, add complexity as needed
2. **Test Thoroughly**: Test all customer types and scenarios
3. **Document Rules**: Add clear names and comments
4. **Monitor Impact**: Track which rules are most frequently applied
5. **Regular Review**: Audit rules quarterly to remove obsolete ones
6. **Use Priority Wisely**: Leave gaps (10, 20, 30) for future rules
7. **Backup Rules**: Export rule configuration before major changes

---

## Future Enhancements

Potential additions to the routing system:

- **Time-based rules**: Different methods during business hours
- **Inventory-based rules**: Payment options based on stock levels
- **Promotion-based rules**: Special payment methods for sales
- **Customer history rules**: Based on past order behavior
- **Dynamic credit limits**: Real-time credit checks
- **A/B testing**: Test different payment method combinations

---

## Support

For questions or issues with payment routing:
- Check logs: `var/log/action_target_payment_routing.log`
- Admin panel: Settings → Payment Routing Rules → Test Mode
- Documentation: See IMPLEMENTATION_GUIDE.md Phase 9