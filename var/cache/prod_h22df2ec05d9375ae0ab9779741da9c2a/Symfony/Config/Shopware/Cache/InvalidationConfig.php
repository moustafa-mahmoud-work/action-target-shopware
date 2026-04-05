<?php

namespace Symfony\Config\Shopware\Cache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Invalidation'.\DIRECTORY_SEPARATOR.'DelayOptionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class InvalidationConfig 
{
    private $delayEnabled;
    private $delayOptions;
    private $httpCache;
    private $tagInvalidationLogEnabled;
    private $productListingRoute;
    private $productDetailRoute;
    private $productSearchRoute;
    private $productSuggestRoute;
    private $productCrossSellingRoute;
    private $paymentMethodRoute;
    private $shippingMethodRoute;
    private $navigationRoute;
    private $categoryRoute;
    private $landingPageRoute;
    private $languageRoute;
    private $currencyRoute;
    private $countryRoute;
    private $countryStateRoute;
    private $salutationRoute;
    private $productReviewRoute;
    private $sitemapRoute;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function delayEnabled($value): static
    {
        $this->_usedProperties['delayEnabled'] = true;
        $this->delayEnabled = $value;

        return $this;
    }

    public function delayOptions(array $value = []): \Symfony\Config\Shopware\Cache\Invalidation\DelayOptionsConfig
    {
        if (null === $this->delayOptions) {
            $this->_usedProperties['delayOptions'] = true;
            $this->delayOptions = new \Symfony\Config\Shopware\Cache\Invalidation\DelayOptionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "delayOptions()" has already been initialized. You cannot pass values the second time you call delayOptions().');
        }

        return $this->delayOptions;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function httpCache(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['httpCache'] = true;
        $this->httpCache = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function tagInvalidationLogEnabled($value): static
    {
        $this->_usedProperties['tagInvalidationLogEnabled'] = true;
        $this->tagInvalidationLogEnabled = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productListingRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productListingRoute'] = true;
        $this->productListingRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productDetailRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productDetailRoute'] = true;
        $this->productDetailRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productSearchRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productSearchRoute'] = true;
        $this->productSearchRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productSuggestRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productSuggestRoute'] = true;
        $this->productSuggestRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productCrossSellingRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productCrossSellingRoute'] = true;
        $this->productCrossSellingRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function paymentMethodRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['paymentMethodRoute'] = true;
        $this->paymentMethodRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function shippingMethodRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['shippingMethodRoute'] = true;
        $this->shippingMethodRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function navigationRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['navigationRoute'] = true;
        $this->navigationRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function categoryRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['categoryRoute'] = true;
        $this->categoryRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function landingPageRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['landingPageRoute'] = true;
        $this->landingPageRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function languageRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['languageRoute'] = true;
        $this->languageRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function currencyRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['currencyRoute'] = true;
        $this->currencyRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function countryRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['countryRoute'] = true;
        $this->countryRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function countryStateRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['countryStateRoute'] = true;
        $this->countryStateRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function salutationRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['salutationRoute'] = true;
        $this->salutationRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function productReviewRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['productReviewRoute'] = true;
        $this->productReviewRoute = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function sitemapRoute(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['sitemapRoute'] = true;
        $this->sitemapRoute = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('delay_enabled', $config)) {
            $this->_usedProperties['delayEnabled'] = true;
            $this->delayEnabled = $config['delay_enabled'];
            unset($config['delay_enabled']);
        }

        if (array_key_exists('delay_options', $config)) {
            $this->_usedProperties['delayOptions'] = true;
            $this->delayOptions = new \Symfony\Config\Shopware\Cache\Invalidation\DelayOptionsConfig($config['delay_options']);
            unset($config['delay_options']);
        }

        if (array_key_exists('http_cache', $config)) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = $config['http_cache'];
            unset($config['http_cache']);
        }

        if (array_key_exists('tag_invalidation_log_enabled', $config)) {
            $this->_usedProperties['tagInvalidationLogEnabled'] = true;
            $this->tagInvalidationLogEnabled = $config['tag_invalidation_log_enabled'];
            unset($config['tag_invalidation_log_enabled']);
        }

        if (array_key_exists('product_listing_route', $config)) {
            $this->_usedProperties['productListingRoute'] = true;
            $this->productListingRoute = $config['product_listing_route'];
            unset($config['product_listing_route']);
        }

        if (array_key_exists('product_detail_route', $config)) {
            $this->_usedProperties['productDetailRoute'] = true;
            $this->productDetailRoute = $config['product_detail_route'];
            unset($config['product_detail_route']);
        }

        if (array_key_exists('product_search_route', $config)) {
            $this->_usedProperties['productSearchRoute'] = true;
            $this->productSearchRoute = $config['product_search_route'];
            unset($config['product_search_route']);
        }

        if (array_key_exists('product_suggest_route', $config)) {
            $this->_usedProperties['productSuggestRoute'] = true;
            $this->productSuggestRoute = $config['product_suggest_route'];
            unset($config['product_suggest_route']);
        }

        if (array_key_exists('product_cross_selling_route', $config)) {
            $this->_usedProperties['productCrossSellingRoute'] = true;
            $this->productCrossSellingRoute = $config['product_cross_selling_route'];
            unset($config['product_cross_selling_route']);
        }

        if (array_key_exists('payment_method_route', $config)) {
            $this->_usedProperties['paymentMethodRoute'] = true;
            $this->paymentMethodRoute = $config['payment_method_route'];
            unset($config['payment_method_route']);
        }

        if (array_key_exists('shipping_method_route', $config)) {
            $this->_usedProperties['shippingMethodRoute'] = true;
            $this->shippingMethodRoute = $config['shipping_method_route'];
            unset($config['shipping_method_route']);
        }

        if (array_key_exists('navigation_route', $config)) {
            $this->_usedProperties['navigationRoute'] = true;
            $this->navigationRoute = $config['navigation_route'];
            unset($config['navigation_route']);
        }

        if (array_key_exists('category_route', $config)) {
            $this->_usedProperties['categoryRoute'] = true;
            $this->categoryRoute = $config['category_route'];
            unset($config['category_route']);
        }

        if (array_key_exists('landing_page_route', $config)) {
            $this->_usedProperties['landingPageRoute'] = true;
            $this->landingPageRoute = $config['landing_page_route'];
            unset($config['landing_page_route']);
        }

        if (array_key_exists('language_route', $config)) {
            $this->_usedProperties['languageRoute'] = true;
            $this->languageRoute = $config['language_route'];
            unset($config['language_route']);
        }

        if (array_key_exists('currency_route', $config)) {
            $this->_usedProperties['currencyRoute'] = true;
            $this->currencyRoute = $config['currency_route'];
            unset($config['currency_route']);
        }

        if (array_key_exists('country_route', $config)) {
            $this->_usedProperties['countryRoute'] = true;
            $this->countryRoute = $config['country_route'];
            unset($config['country_route']);
        }

        if (array_key_exists('country_state_route', $config)) {
            $this->_usedProperties['countryStateRoute'] = true;
            $this->countryStateRoute = $config['country_state_route'];
            unset($config['country_state_route']);
        }

        if (array_key_exists('salutation_route', $config)) {
            $this->_usedProperties['salutationRoute'] = true;
            $this->salutationRoute = $config['salutation_route'];
            unset($config['salutation_route']);
        }

        if (array_key_exists('product_review_route', $config)) {
            $this->_usedProperties['productReviewRoute'] = true;
            $this->productReviewRoute = $config['product_review_route'];
            unset($config['product_review_route']);
        }

        if (array_key_exists('sitemap_route', $config)) {
            $this->_usedProperties['sitemapRoute'] = true;
            $this->sitemapRoute = $config['sitemap_route'];
            unset($config['sitemap_route']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['delayEnabled'])) {
            $output['delay_enabled'] = $this->delayEnabled;
        }
        if (isset($this->_usedProperties['delayOptions'])) {
            $output['delay_options'] = $this->delayOptions->toArray();
        }
        if (isset($this->_usedProperties['httpCache'])) {
            $output['http_cache'] = $this->httpCache;
        }
        if (isset($this->_usedProperties['tagInvalidationLogEnabled'])) {
            $output['tag_invalidation_log_enabled'] = $this->tagInvalidationLogEnabled;
        }
        if (isset($this->_usedProperties['productListingRoute'])) {
            $output['product_listing_route'] = $this->productListingRoute;
        }
        if (isset($this->_usedProperties['productDetailRoute'])) {
            $output['product_detail_route'] = $this->productDetailRoute;
        }
        if (isset($this->_usedProperties['productSearchRoute'])) {
            $output['product_search_route'] = $this->productSearchRoute;
        }
        if (isset($this->_usedProperties['productSuggestRoute'])) {
            $output['product_suggest_route'] = $this->productSuggestRoute;
        }
        if (isset($this->_usedProperties['productCrossSellingRoute'])) {
            $output['product_cross_selling_route'] = $this->productCrossSellingRoute;
        }
        if (isset($this->_usedProperties['paymentMethodRoute'])) {
            $output['payment_method_route'] = $this->paymentMethodRoute;
        }
        if (isset($this->_usedProperties['shippingMethodRoute'])) {
            $output['shipping_method_route'] = $this->shippingMethodRoute;
        }
        if (isset($this->_usedProperties['navigationRoute'])) {
            $output['navigation_route'] = $this->navigationRoute;
        }
        if (isset($this->_usedProperties['categoryRoute'])) {
            $output['category_route'] = $this->categoryRoute;
        }
        if (isset($this->_usedProperties['landingPageRoute'])) {
            $output['landing_page_route'] = $this->landingPageRoute;
        }
        if (isset($this->_usedProperties['languageRoute'])) {
            $output['language_route'] = $this->languageRoute;
        }
        if (isset($this->_usedProperties['currencyRoute'])) {
            $output['currency_route'] = $this->currencyRoute;
        }
        if (isset($this->_usedProperties['countryRoute'])) {
            $output['country_route'] = $this->countryRoute;
        }
        if (isset($this->_usedProperties['countryStateRoute'])) {
            $output['country_state_route'] = $this->countryStateRoute;
        }
        if (isset($this->_usedProperties['salutationRoute'])) {
            $output['salutation_route'] = $this->salutationRoute;
        }
        if (isset($this->_usedProperties['productReviewRoute'])) {
            $output['product_review_route'] = $this->productReviewRoute;
        }
        if (isset($this->_usedProperties['sitemapRoute'])) {
            $output['sitemap_route'] = $this->sitemapRoute;
        }

        return $output;
    }

}
