<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Service\Routing;

use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Customer\CustomerEntity;
use Shopware\Core\Checkout\Payment\PaymentMethodCollection;
use Shopware\Core\Checkout\Payment\PaymentMethodEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;
use Shopware\Core\System\SalesChannel\SalesChannelContext;

/**
 * Service for routing payment methods based on business rules
 * 
 * This service evaluates routing rules to determine which payment methods
 * should be available to a customer based on their profile, cart contents,
 * and other contextual factors.
 */
class PaymentRoutingService
{
    private const ACTION_ALLOW = 'allow';
    private const ACTION_DENY = 'deny';
    private const ACTION_ROUTE_TO_MANUAL = 'route_to_manual';
    private const ACTION_REQUIRE_APPROVAL = 'require_approval';

    public function __construct(
        private readonly EntityRepository $routingRuleRepository,
        private readonly EntityRepository $paymentMethodRepository
    ) {
    }

    /**
     * Get available payment methods for the given context
     * 
     * @param CustomerEntity|null $customer The customer (null for guest)
     * @param Cart $cart The shopping cart
     * @param SalesChannelContext $context The sales channel context
     * @return PaymentMethodCollection Filtered payment methods
     */
    public function getAvailablePaymentMethods(
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): PaymentMethodCollection {
        // Get all active routing rules sorted by priority
        $rules = $this->getActiveRules($context->getContext());
        
        // Get all payment methods
        $methods = $this->getAllPaymentMethods($context);
        
        // Apply each rule in priority order
        foreach ($rules as $rule) {
            $methods = $this->applyRule($rule, $methods, $customer, $cart, $context);
        }
        
        return $methods;
    }

    /**
     * Apply a routing rule to filter payment methods
     * 
     * This method evaluates rule conditions and applies the corresponding action
     * to modify the available payment methods collection.
     * 
     * @param array $rule The routing rule data
     * @param PaymentMethodCollection $methods Current payment methods
     * @param CustomerEntity|null $customer The customer
     * @param Cart $cart The shopping cart
     * @param SalesChannelContext $context The sales channel context
     * @return PaymentMethodCollection Modified payment methods
     */
    protected function applyRule(
        array $rule,
        PaymentMethodCollection $methods,
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): PaymentMethodCollection {
        // Skip inactive rules
        if (!($rule['is_active'] ?? true)) {
            return $methods;
        }

        // Decode conditions from JSON
        $conditions = json_decode($rule['conditions'] ?? '{}', true);
        
        // Check if all conditions are met
        if (!$this->evaluateConditions($conditions, $customer, $cart, $context)) {
            return $methods;
        }

        // Get the target payment method type
        $paymentMethodType = $rule['payment_method_type'] ?? null;
        
        // Apply the rule action
        $action = $rule['action'] ?? self::ACTION_ALLOW;
        
        return match ($action) {
            self::ACTION_ALLOW => $this->applyAllowAction($methods, $paymentMethodType),
            self::ACTION_DENY => $this->applyDenyAction($methods, $paymentMethodType),
            self::ACTION_ROUTE_TO_MANUAL => $this->applyRouteToManualAction($methods, $paymentMethodType),
            self::ACTION_REQUIRE_APPROVAL => $this->applyRequireApprovalAction($methods, $paymentMethodType),
            default => $methods,
        };
    }

    /**
     * Evaluate all conditions for a rule
     * 
     * Conditions structure example:
     * {
     *   "customer_group": ["b2b_customers"],
     *   "min_amount": 1000.00,
     *   "max_amount": 50000.00,
     *   "countries": ["US", "CA"],
     *   "customer_tags": ["net30_approved"],
     *   "cart_contains_category": ["electronics"],
     *   "customer_credit_limit": 10000.00
     * }
     * 
     * @param array $conditions Rule conditions
     * @param CustomerEntity|null $customer The customer
     * @param Cart $cart The shopping cart
     * @param SalesChannelContext $context The sales channel context
     * @return bool True if all conditions are met
     */
    protected function evaluateConditions(
        array $conditions,
        ?CustomerEntity $customer,
        Cart $cart,
        SalesChannelContext $context
    ): bool {
        // Customer group condition
        if (isset($conditions['customer_group'])) {
            if (!$this->checkCustomerGroup($customer, $conditions['customer_group'])) {
                return false;
            }
        }

        // Minimum amount condition
        if (isset($conditions['min_amount'])) {
            if ($cart->getPrice()->getTotalPrice() < (float)$conditions['min_amount']) {
                return false;
            }
        }

        // Maximum amount condition
        if (isset($conditions['max_amount'])) {
            if ($cart->getPrice()->getTotalPrice() > (float)$conditions['max_amount']) {
                return false;
            }
        }

        // Country condition
        if (isset($conditions['countries'])) {
            if (!$this->checkCountry($context, $conditions['countries'])) {
                return false;
            }
        }

        // Customer tags condition
        if (isset($conditions['customer_tags'])) {
            if (!$this->checkCustomerTags($customer, $conditions['customer_tags'])) {
                return false;
            }
        }

        // Cart contains category condition
        if (isset($conditions['cart_contains_category'])) {
            if (!$this->checkCartCategories($cart, $conditions['cart_contains_category'])) {
                return false;
            }
        }

        // Customer credit limit condition
        if (isset($conditions['customer_credit_limit'])) {
            if (!$this->checkCreditLimit($customer, (float)$conditions['customer_credit_limit'])) {
                return false;
            }
        }

        // Is guest condition
        if (isset($conditions['is_guest'])) {
            if (($customer === null) !== (bool)$conditions['is_guest']) {
                return false;
            }
        }

        // All conditions passed
        return true;
    }

    /**
     * Allow action: Keep only the specified payment method
     */
    protected function applyAllowAction(
        PaymentMethodCollection $methods,
        ?string $paymentMethodType
    ): PaymentMethodCollection {
        if ($paymentMethodType === null) {
            return $methods;
        }

        return $methods->filter(function (PaymentMethodEntity $method) use ($paymentMethodType) {
            return $this->matchesPaymentMethodType($method, $paymentMethodType);
        });
    }

    /**
     * Deny action: Remove the specified payment method
     */
    protected function applyDenyAction(
        PaymentMethodCollection $methods,
        ?string $paymentMethodType
    ): PaymentMethodCollection {
        if ($paymentMethodType === null) {
            return new PaymentMethodCollection();
        }

        return $methods->filter(function (PaymentMethodEntity $method) use ($paymentMethodType) {
            return !$this->matchesPaymentMethodType($method, $paymentMethodType);
        });
    }

    /**
     * Route to manual action: Mark payment method for manual review
     */
    protected function applyRouteToManualAction(
        PaymentMethodCollection $methods,
        ?string $paymentMethodType
    ): PaymentMethodCollection {
        // In a real implementation, this would add metadata to the payment method
        // indicating it requires manual review
        foreach ($methods as $method) {
            if ($this->matchesPaymentMethodType($method, $paymentMethodType)) {
                // Add custom field to indicate manual review required
                $customFields = $method->getCustomFields() ?? [];
                $customFields['requires_manual_review'] = true;
                $method->setCustomFields($customFields);
            }
        }

        return $methods;
    }

    /**
     * Require approval action: Mark payment method as requiring approval
     */
    protected function applyRequireApprovalAction(
        PaymentMethodCollection $methods,
        ?string $paymentMethodType
    ): PaymentMethodCollection {
        foreach ($methods as $method) {
            if ($this->matchesPaymentMethodType($method, $paymentMethodType)) {
                $customFields = $method->getCustomFields() ?? [];
                $customFields['requires_approval'] = true;
                $method->setCustomFields($customFields);
            }
        }

        return $methods;
    }

    /**
     * Check if customer belongs to specified group(s)
     */
    protected function checkCustomerGroup(?CustomerEntity $customer, array $allowedGroups): bool
    {
        if ($customer === null) {
            return false;
        }

        $customerGroup = $customer->getGroup();
        if ($customerGroup === null) {
            return false;
        }

        return in_array($customerGroup->getId(), $allowedGroups, true) ||
               in_array($customerGroup->getName(), $allowedGroups, true);
    }

    /**
     * Check if billing country matches allowed countries
     */
    protected function checkCountry(SalesChannelContext $context, array $allowedCountries): bool
    {
        $customer = $context->getCustomer();
        if ($customer === null) {
            return false;
        }

        $billingAddress = $customer->getActiveBillingAddress();
        if ($billingAddress === null) {
            return false;
        }

        $country = $billingAddress->getCountry();
        if ($country === null) {
            return false;
        }

        return in_array($country->getIso(), $allowedCountries, true);
    }

    /**
     * Check if customer has required tags
     */
    protected function checkCustomerTags(?CustomerEntity $customer, array $requiredTags): bool
    {
        if ($customer === null) {
            return false;
        }

        $customerTags = $customer->getTags();
        if ($customerTags === null) {
            return false;
        }

        foreach ($requiredTags as $requiredTag) {
            $hasTag = false;
            foreach ($customerTags as $tag) {
                if ($tag->getName() === $requiredTag) {
                    $hasTag = true;
                    break;
                }
            }
            if (!$hasTag) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if cart contains products from specified categories
     */
    protected function checkCartCategories(Cart $cart, array $requiredCategories): bool
    {
        foreach ($cart->getLineItems() as $lineItem) {
            $payload = $lineItem->getPayload();
            if (!isset($payload['categoryIds'])) {
                continue;
            }

            foreach ($requiredCategories as $categoryId) {
                if (in_array($categoryId, $payload['categoryIds'], true)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check if customer has sufficient credit limit
     */
    protected function checkCreditLimit(?CustomerEntity $customer, float $requiredLimit): bool
    {
        if ($customer === null) {
            return false;
        }

        $customFields = $customer->getCustomFields() ?? [];
        $creditLimit = (float)($customFields['credit_limit'] ?? 0);

        return $creditLimit >= $requiredLimit;
    }

    /**
     * Check if payment method matches the specified type
     */
    protected function matchesPaymentMethodType(PaymentMethodEntity $method, ?string $type): bool
    {
        if ($type === null) {
            return false;
        }

        // Check by handler class name
        $handlerIdentifier = $method->getHandlerIdentifier();
        if (str_contains($handlerIdentifier, $type)) {
            return true;
        }

        // Check by custom field
        $customFields = $method->getCustomFields() ?? [];
        return ($customFields['payment_type'] ?? '') === $type;
    }

    /**
     * Get all active routing rules sorted by priority
     */
    protected function getActiveRules(Context $context): array
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('isActive', true));
        $criteria->addSorting(new FieldSorting('priority', FieldSorting::DESCENDING));

        $result = $this->routingRuleRepository->search($criteria, $context);
        
        return array_map(fn($entity) => $entity->jsonSerialize(), $result->getElements());
    }

    /**
     * Get all payment methods for the sales channel
     */
    protected function getAllPaymentMethods(SalesChannelContext $context): PaymentMethodCollection
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active', true));
        
        $result = $this->paymentMethodRepository->search($criteria, $context->getContext());
        
        return new PaymentMethodCollection($result->getElements());
    }
}

// Made with Bob
