<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Tests\Service\Routing;

use ActionTarget\PaymentGate\Service\Routing\PaymentRoutingService;
use PHPUnit\Framework\TestCase;
use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\Checkout\Cart\Price\Struct\CartPrice;
use Shopware\Core\Checkout\Cart\LineItem\LineItem;
use Shopware\Core\Checkout\Customer\CustomerEntity;
use Shopware\Core\Checkout\Customer\Aggregate\CustomerGroup\CustomerGroupEntity;
use Shopware\Core\Checkout\Customer\Aggregate\CustomerAddress\CustomerAddressEntity;
use Shopware\Core\Checkout\Payment\PaymentMethodCollection;
use Shopware\Core\Checkout\Payment\PaymentMethodEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\EntitySearchResult;
use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Core\System\Tag\TagCollection;
use Shopware\Core\System\Tag\TagEntity;

/**
 * Test cases for Payment Routing Service
 * 
 * These tests demonstrate how the rule engine evaluates conditions
 * and applies actions to filter payment methods.
 */
class PaymentRoutingServiceTest extends TestCase
{
    private PaymentRoutingService $service;
    private EntityRepository $routingRuleRepository;
    private EntityRepository $paymentMethodRepository;

    protected function setUp(): void
    {
        $this->routingRuleRepository = $this->createMock(EntityRepository::class);
        $this->paymentMethodRepository = $this->createMock(EntityRepository::class);
        
        $this->service = new PaymentRoutingService(
            $this->routingRuleRepository,
            $this->paymentMethodRepository
        );
    }

    /**
     * Test: B2B customer with Net 30 approval sees Net 30 payment method
     */
    public function testB2BCustomerWithNet30Approval(): void
    {
        // Arrange: Create B2B customer with Net 30 approval
        $customer = $this->createB2BCustomer([
            'tags' => ['net30_approved'],
            'credit_limit' => 10000.00
        ]);
        
        $cart = $this->createCart(2500.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'Enable Net 30 for B2B',
                'priority' => 100,
                'payment_method_type' => 'Net30Handler',
                'action' => 'allow',
                'conditions' => json_encode([
                    'customer_group' => ['b2b_customers'],
                    'customer_tags' => ['net30_approved'],
                    'customer_credit_limit' => 5000.00
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler'),
            $this->createPaymentMethod('net30', 'Net30Handler'),
            $this->createPaymentMethod('wire', 'WireTransferHandler')
        ]);
        
        // Act: Get available payment methods
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Net 30 should be available
        $this->assertCount(1, $availableMethods);
        $this->assertTrue($this->hasPaymentMethod($availableMethods, 'Net30Handler'));
    }

    /**
     * Test: Guest customer cannot see Net 30
     */
    public function testGuestCustomerCannotSeeNet30(): void
    {
        // Arrange: Guest checkout (no customer)
        $customer = null;
        $cart = $this->createCart(500.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'Guest - No Net 30',
                'priority' => 85,
                'payment_method_type' => 'Net30Handler',
                'action' => 'deny',
                'conditions' => json_encode([
                    'is_guest' => true
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler'),
            $this->createPaymentMethod('net30', 'Net30Handler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Only credit card available
        $this->assertCount(1, $availableMethods);
        $this->assertTrue($this->hasPaymentMethod($availableMethods, 'CreditCardHandler'));
        $this->assertFalse($this->hasPaymentMethod($availableMethods, 'Net30Handler'));
    }

    /**
     * Test: Large orders require manual review
     */
    public function testLargeOrdersRequireManualReview(): void
    {
        // Arrange: Order over $10,000
        $customer = $this->createB2CCustomer();
        $cart = $this->createCart(15000.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'Large Orders Manual Review',
                'priority' => 90,
                'payment_method_type' => 'CreditCardHandler',
                'action' => 'route_to_manual',
                'conditions' => json_encode([
                    'min_amount' => 10000.00
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Credit card available but flagged for manual review
        $this->assertCount(1, $availableMethods);
        $creditCard = $availableMethods->first();
        $customFields = $creditCard->getCustomFields() ?? [];
        $this->assertTrue($customFields['requires_manual_review'] ?? false);
    }

    /**
     * Test: International orders use wire transfer
     */
    public function testInternationalOrdersUseWireTransfer(): void
    {
        // Arrange: Customer in Germany
        $customer = $this->createB2CCustomer(['country' => 'DE']);
        $cart = $this->createCart(5000.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'International - Wire Transfer Only',
                'priority' => 95,
                'payment_method_type' => 'WireTransferHandler',
                'action' => 'allow',
                'conditions' => json_encode([
                    'countries' => ['GB', 'DE', 'FR']
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler'),
            $this->createPaymentMethod('wire', 'WireTransferHandler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Only wire transfer available
        $this->assertCount(1, $availableMethods);
        $this->assertTrue($this->hasPaymentMethod($availableMethods, 'WireTransferHandler'));
    }

    /**
     * Test: Amount-based routing
     */
    public function testAmountBasedRouting(): void
    {
        // Arrange: Small order under $100
        $customer = $this->createB2CCustomer();
        $cart = $this->createCart(75.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'Small Orders - Credit Card Only',
                'priority' => 70,
                'payment_method_type' => 'CreditCardHandler',
                'action' => 'allow',
                'conditions' => json_encode([
                    'max_amount' => 100.00
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler'),
            $this->createPaymentMethod('net30', 'Net30Handler'),
            $this->createPaymentMethod('wire', 'WireTransferHandler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Only credit card for small orders
        $this->assertCount(1, $availableMethods);
        $this->assertTrue($this->hasPaymentMethod($availableMethods, 'CreditCardHandler'));
    }

    /**
     * Test: Multiple rules with priority
     */
    public function testMultipleRulesWithPriority(): void
    {
        // Arrange: VIP customer with large order
        $customer = $this->createB2BCustomer([
            'tags' => ['vip_customer', 'net30_approved'],
            'credit_limit' => 50000.00
        ]);
        $cart = $this->createCart(12000.00);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules (VIP rule should override large order restriction)
        $this->mockRoutingRules([
            [
                'name' => 'VIP - All Methods',
                'priority' => 150,
                'payment_method_type' => null,
                'action' => 'allow',
                'conditions' => json_encode([
                    'customer_tags' => ['vip_customer']
                ]),
                'is_active' => true
            ],
            [
                'name' => 'Large Orders - No Credit Card',
                'priority' => 75,
                'payment_method_type' => 'CreditCardHandler',
                'action' => 'deny',
                'conditions' => json_encode([
                    'min_amount' => 10000.00
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler'),
            $this->createPaymentMethod('net30', 'Net30Handler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: VIP gets all methods despite large order
        $this->assertCount(2, $availableMethods);
    }

    /**
     * Test: Category-based routing
     */
    public function testCategoryBasedRouting(): void
    {
        // Arrange: Cart with electronics
        $customer = $this->createB2CCustomer();
        $cart = $this->createCartWithCategories(6000.00, ['electronics']);
        $context = $this->createSalesChannelContext($customer);
        
        // Mock routing rules
        $this->mockRoutingRules([
            [
                'name' => 'High-Value Electronics Approval',
                'priority' => 80,
                'payment_method_type' => 'CreditCardHandler',
                'action' => 'require_approval',
                'conditions' => json_encode([
                    'min_amount' => 5000.00,
                    'cart_contains_category' => ['electronics']
                ]),
                'is_active' => true
            ]
        ]);
        
        // Mock payment methods
        $this->mockPaymentMethods([
            $this->createPaymentMethod('credit_card', 'CreditCardHandler')
        ]);
        
        // Act
        $availableMethods = $this->service->getAvailablePaymentMethods(
            $customer,
            $cart,
            $context
        );
        
        // Assert: Credit card requires approval
        $this->assertCount(1, $availableMethods);
        $creditCard = $availableMethods->first();
        $customFields = $creditCard->getCustomFields() ?? [];
        $this->assertTrue($customFields['requires_approval'] ?? false);
    }

    // Helper methods

    private function createB2BCustomer(array $options = []): CustomerEntity
    {
        $customer = new CustomerEntity();
        $customer->setId('customer-id');
        
        $group = new CustomerGroupEntity();
        $group->setId('b2b-group-id');
        $group->setName('b2b_customers');
        $customer->setGroup($group);
        
        if (isset($options['tags'])) {
            $tags = new TagCollection();
            foreach ($options['tags'] as $tagName) {
                $tag = new TagEntity();
                $tag->setName($tagName);
                $tags->add($tag);
            }
            $customer->setTags($tags);
        }
        
        if (isset($options['credit_limit'])) {
            $customer->setCustomFields([
                'credit_limit' => $options['credit_limit']
            ]);
        }
        
        if (isset($options['country'])) {
            $address = new CustomerAddressEntity();
            $country = new CountryEntity();
            $country->setIso($options['country']);
            $address->setCountry($country);
            $customer->setActiveBillingAddress($address);
        }
        
        return $customer;
    }

    private function createB2CCustomer(array $options = []): CustomerEntity
    {
        $customer = new CustomerEntity();
        $customer->setId('customer-id');
        
        $group = new CustomerGroupEntity();
        $group->setId('b2c-group-id');
        $group->setName('b2c_customers');
        $customer->setGroup($group);
        
        if (isset($options['country'])) {
            $address = new CustomerAddressEntity();
            $country = new CountryEntity();
            $country->setIso($options['country']);
            $address->setCountry($country);
            $customer->setActiveBillingAddress($address);
        }
        
        return $customer;
    }

    private function createCart(float $total): Cart
    {
        $cart = new Cart('test-cart');
        $price = $this->createMock(CartPrice::class);
        $price->method('getTotalPrice')->willReturn($total);
        $cart->setPrice($price);
        
        return $cart;
    }

    private function createCartWithCategories(float $total, array $categories): Cart
    {
        $cart = $this->createCart($total);
        
        $lineItem = new LineItem('item-1', 'product');
        $lineItem->setPayload(['categoryIds' => $categories]);
        $cart->add($lineItem);
        
        return $cart;
    }

    private function createSalesChannelContext(?CustomerEntity $customer): SalesChannelContext
    {
        $context = $this->createMock(SalesChannelContext::class);
        $context->method('getCustomer')->willReturn($customer);
        $context->method('getContext')->willReturn(Context::createDefaultContext());
        
        return $context;
    }

    private function createPaymentMethod(string $id, string $handler): PaymentMethodEntity
    {
        $method = new PaymentMethodEntity();
        $method->setId($id);
        $method->setHandlerIdentifier($handler);
        $method->setActive(true);
        
        return $method;
    }

    private function mockRoutingRules(array $rules): void
    {
        $searchResult = $this->createMock(EntitySearchResult::class);
        $searchResult->method('getElements')->willReturn($rules);
        
        $this->routingRuleRepository
            ->method('search')
            ->willReturn($searchResult);
    }

    private function mockPaymentMethods(array $methods): void
    {
        $searchResult = $this->createMock(EntitySearchResult::class);
        $searchResult->method('getElements')->willReturn($methods);
        
        $this->paymentMethodRepository
            ->method('search')
            ->willReturn($searchResult);
    }

    private function hasPaymentMethod(PaymentMethodCollection $methods, string $handler): bool
    {
        foreach ($methods as $method) {
            if (str_contains($method->getHandlerIdentifier(), $handler)) {
                return true;
            }
        }
        return false;
    }
}

// Made with Bob
