<?php

namespace Symfony\Config\Shopware\Api;

require_once __DIR__.\DIRECTORY_SEPARATOR.'RateLimiterConfig'.\DIRECTORY_SEPARATOR.'RateConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RateLimiterConfig 
{
    private $enabled;
    private $lockFactory;
    private $policy;
    private $limit;
    private $cachePool;
    private $interval;
    private $reset;
    private $rate;
    private $limits;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default 'lock.factory'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lockFactory($value): static
    {
        $this->_usedProperties['lockFactory'] = true;
        $this->lockFactory = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function policy($value): static
    {
        $this->_usedProperties['policy'] = true;
        $this->policy = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function limit($value): static
    {
        $this->_usedProperties['limit'] = true;
        $this->limit = $value;

        return $this;
    }

    /**
     * @default 'cache.rate_limiter'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cachePool($value): static
    {
        $this->_usedProperties['cachePool'] = true;
        $this->cachePool = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function interval($value): static
    {
        $this->_usedProperties['interval'] = true;
        $this->interval = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function reset($value): static
    {
        $this->_usedProperties['reset'] = true;
        $this->reset = $value;

        return $this;
    }

    public function rate(array $value = []): \Symfony\Config\Shopware\Api\RateLimiterConfig\RateConfig
    {
        if (null === $this->rate) {
            $this->_usedProperties['rate'] = true;
            $this->rate = new \Symfony\Config\Shopware\Api\RateLimiterConfig\RateConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "rate()" has already been initialized. You cannot pass values the second time you call rate().');
        }

        return $this->rate;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function limits(mixed $value): static
    {
        $this->_usedProperties['limits'] = true;
        $this->limits = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('lock_factory', $config)) {
            $this->_usedProperties['lockFactory'] = true;
            $this->lockFactory = $config['lock_factory'];
            unset($config['lock_factory']);
        }

        if (array_key_exists('policy', $config)) {
            $this->_usedProperties['policy'] = true;
            $this->policy = $config['policy'];
            unset($config['policy']);
        }

        if (array_key_exists('limit', $config)) {
            $this->_usedProperties['limit'] = true;
            $this->limit = $config['limit'];
            unset($config['limit']);
        }

        if (array_key_exists('cache_pool', $config)) {
            $this->_usedProperties['cachePool'] = true;
            $this->cachePool = $config['cache_pool'];
            unset($config['cache_pool']);
        }

        if (array_key_exists('interval', $config)) {
            $this->_usedProperties['interval'] = true;
            $this->interval = $config['interval'];
            unset($config['interval']);
        }

        if (array_key_exists('reset', $config)) {
            $this->_usedProperties['reset'] = true;
            $this->reset = $config['reset'];
            unset($config['reset']);
        }

        if (array_key_exists('rate', $config)) {
            $this->_usedProperties['rate'] = true;
            $this->rate = new \Symfony\Config\Shopware\Api\RateLimiterConfig\RateConfig($config['rate']);
            unset($config['rate']);
        }

        if (array_key_exists('limits', $config)) {
            $this->_usedProperties['limits'] = true;
            $this->limits = $config['limits'];
            unset($config['limits']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['lockFactory'])) {
            $output['lock_factory'] = $this->lockFactory;
        }
        if (isset($this->_usedProperties['policy'])) {
            $output['policy'] = $this->policy;
        }
        if (isset($this->_usedProperties['limit'])) {
            $output['limit'] = $this->limit;
        }
        if (isset($this->_usedProperties['cachePool'])) {
            $output['cache_pool'] = $this->cachePool;
        }
        if (isset($this->_usedProperties['interval'])) {
            $output['interval'] = $this->interval;
        }
        if (isset($this->_usedProperties['reset'])) {
            $output['reset'] = $this->reset;
        }
        if (isset($this->_usedProperties['rate'])) {
            $output['rate'] = $this->rate->toArray();
        }
        if (isset($this->_usedProperties['limits'])) {
            $output['limits'] = $this->limits;
        }

        return $output;
    }

}
