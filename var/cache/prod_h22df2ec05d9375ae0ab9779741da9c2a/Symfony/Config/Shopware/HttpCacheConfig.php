<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'HttpCache'.\DIRECTORY_SEPARATOR.'PoliciesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HttpCache'.\DIRECTORY_SEPARATOR.'DefaultPoliciesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HttpCache'.\DIRECTORY_SEPARATOR.'ReverseProxyConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HttpCacheConfig 
{
    private $staleWhileRevalidate;
    private $staleIfError;
    private $softPurge;
    private $policies;
    private $defaultPolicies;
    private $routePolicies;
    private $cookies;
    private $ignoredUrlParameters;
    private $reverseProxy;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function staleWhileRevalidate($value): static
    {
        $this->_usedProperties['staleWhileRevalidate'] = true;
        $this->staleWhileRevalidate = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function staleIfError($value): static
    {
        $this->_usedProperties['staleIfError'] = true;
        $this->staleIfError = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function softPurge($value): static
    {
        $this->_usedProperties['softPurge'] = true;
        $this->softPurge = $value;

        return $this;
    }

    public function policies(string $name, array $value = []): \Symfony\Config\Shopware\HttpCache\PoliciesConfig
    {
        if (!isset($this->policies[$name])) {
            $this->_usedProperties['policies'] = true;
            $this->policies[$name] = new \Symfony\Config\Shopware\HttpCache\PoliciesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "policies()" has already been initialized. You cannot pass values the second time you call policies().');
        }

        return $this->policies[$name];
    }

    /**
     * Default cache policies per area. Currently only "storefront" and "store_api" are supported.
     */
    public function defaultPolicies(string $area, array $value = []): \Symfony\Config\Shopware\HttpCache\DefaultPoliciesConfig
    {
        if (!isset($this->defaultPolicies[$area])) {
            $this->_usedProperties['defaultPolicies'] = true;
            $this->defaultPolicies[$area] = new \Symfony\Config\Shopware\HttpCache\DefaultPoliciesConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "defaultPolicies()" has already been initialized. You cannot pass values the second time you call defaultPolicies().');
        }

        return $this->defaultPolicies[$area];
    }

    /**
     * @return $this
     */
    public function routePolicies(string $route, mixed $value): static
    {
        $this->_usedProperties['routePolicies'] = true;
        $this->routePolicies[$route] = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function cookies(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['cookies'] = true;
        $this->cookies = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function ignoredUrlParameters(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['ignoredUrlParameters'] = true;
        $this->ignoredUrlParameters = $value;

        return $this;
    }

    public function reverseProxy(array $value = []): \Symfony\Config\Shopware\HttpCache\ReverseProxyConfig
    {
        if (null === $this->reverseProxy) {
            $this->_usedProperties['reverseProxy'] = true;
            $this->reverseProxy = new \Symfony\Config\Shopware\HttpCache\ReverseProxyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "reverseProxy()" has already been initialized. You cannot pass values the second time you call reverseProxy().');
        }

        return $this->reverseProxy;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('stale_while_revalidate', $config)) {
            $this->_usedProperties['staleWhileRevalidate'] = true;
            $this->staleWhileRevalidate = $config['stale_while_revalidate'];
            unset($config['stale_while_revalidate']);
        }

        if (array_key_exists('stale_if_error', $config)) {
            $this->_usedProperties['staleIfError'] = true;
            $this->staleIfError = $config['stale_if_error'];
            unset($config['stale_if_error']);
        }

        if (array_key_exists('soft_purge', $config)) {
            $this->_usedProperties['softPurge'] = true;
            $this->softPurge = $config['soft_purge'];
            unset($config['soft_purge']);
        }

        if (array_key_exists('policies', $config)) {
            $this->_usedProperties['policies'] = true;
            $this->policies = array_map(fn ($v) => new \Symfony\Config\Shopware\HttpCache\PoliciesConfig($v), $config['policies']);
            unset($config['policies']);
        }

        if (array_key_exists('default_policies', $config)) {
            $this->_usedProperties['defaultPolicies'] = true;
            $this->defaultPolicies = array_map(fn ($v) => new \Symfony\Config\Shopware\HttpCache\DefaultPoliciesConfig($v), $config['default_policies']);
            unset($config['default_policies']);
        }

        if (array_key_exists('route_policies', $config)) {
            $this->_usedProperties['routePolicies'] = true;
            $this->routePolicies = $config['route_policies'];
            unset($config['route_policies']);
        }

        if (array_key_exists('cookies', $config)) {
            $this->_usedProperties['cookies'] = true;
            $this->cookies = $config['cookies'];
            unset($config['cookies']);
        }

        if (array_key_exists('ignored_url_parameters', $config)) {
            $this->_usedProperties['ignoredUrlParameters'] = true;
            $this->ignoredUrlParameters = $config['ignored_url_parameters'];
            unset($config['ignored_url_parameters']);
        }

        if (array_key_exists('reverse_proxy', $config)) {
            $this->_usedProperties['reverseProxy'] = true;
            $this->reverseProxy = new \Symfony\Config\Shopware\HttpCache\ReverseProxyConfig($config['reverse_proxy']);
            unset($config['reverse_proxy']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['staleWhileRevalidate'])) {
            $output['stale_while_revalidate'] = $this->staleWhileRevalidate;
        }
        if (isset($this->_usedProperties['staleIfError'])) {
            $output['stale_if_error'] = $this->staleIfError;
        }
        if (isset($this->_usedProperties['softPurge'])) {
            $output['soft_purge'] = $this->softPurge;
        }
        if (isset($this->_usedProperties['policies'])) {
            $output['policies'] = array_map(fn ($v) => $v->toArray(), $this->policies);
        }
        if (isset($this->_usedProperties['defaultPolicies'])) {
            $output['default_policies'] = array_map(fn ($v) => $v->toArray(), $this->defaultPolicies);
        }
        if (isset($this->_usedProperties['routePolicies'])) {
            $output['route_policies'] = $this->routePolicies;
        }
        if (isset($this->_usedProperties['cookies'])) {
            $output['cookies'] = $this->cookies;
        }
        if (isset($this->_usedProperties['ignoredUrlParameters'])) {
            $output['ignored_url_parameters'] = $this->ignoredUrlParameters;
        }
        if (isset($this->_usedProperties['reverseProxy'])) {
            $output['reverse_proxy'] = $this->reverseProxy->toArray();
        }

        return $output;
    }

}
