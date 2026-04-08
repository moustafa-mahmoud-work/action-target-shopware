<?php declare(strict_types=1);

namespace ActionTarget\PaymentGate\Storefront\Page\Checkout\Confirm;

use ActionTarget\PaymentGate\Service\SavedPaymentMethod\SavedPaymentMethodService;
use Shopware\Core\Checkout\Cart\Cart;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Shopware\Storefront\Page\Checkout\Confirm\CheckoutConfirmPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Checkout Payment Page Loader
 * 
 * Extends checkout confirm page with payment-specific data
 */
class CheckoutConfirmPaymentPageLoader implements EventSubscriberInterface
{
    private SavedPaymentMethodService $savedPaymentMethodService;

    public function __construct(
        SavedPaymentMethodService $savedPaymentMethodService
    ) {
        $this->savedPaymentMethodService = $savedPaymentMethodService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            CheckoutConfirmPageLoadedEvent::class => 'onCheckoutConfirmLoaded',
        ];
    }

    /**
     * Add payment-specific data to checkout confirm page
     */
    public function onCheckoutConfirmLoaded(CheckoutConfirmPageLoadedEvent $event): void
    {
        $page = $event->getPage();
        $context = $event->getSalesChannelContext();
        $customer = $context->getCustomer();

        if (!$customer) {
            return;
        }

        // Load saved payment methods for customer
        $savedPaymentMethods = $this->savedPaymentMethodService->getCustomerPaymentMethods(
            $customer->getId(),
            $context->getContext()
        );

        // Add to page extensions
        $page->addExtension('actionTargetSavedPaymentMethods', $savedPaymentMethods);

        // Add payment configuration
        $paymentConfig = $this->getPaymentConfiguration($context);
        $page->addExtension('actionTargetPaymentConfig', $paymentConfig);
    }

    /**
     * Get payment configuration for frontend
     */
    private function getPaymentConfiguration(SalesChannelContext $context): array
    {
        return [
            'enableSavedCards' => true,
            'enable3DSecure' => true,
            'supportedCardTypes' => ['visa', 'mastercard', 'amex', 'discover'],
            'iframeUrl' => $this->getIframeUrl($context),
        ];
    }

    /**
     * Get iframe URL for secure card entry
     */
    private function getIframeUrl(SalesChannelContext $context): string
    {
        // TODO: Get from system config
        return 'https://secure.paymentgate.com/card-entry';
    }
}

// @Author Moustafa M S