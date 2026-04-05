<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Cache'.\DIRECTORY_SEPARATOR.'TwigConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Cache'.\DIRECTORY_SEPARATOR.'InvalidationConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CacheConfig 
{
    private $redisPrefix;
    private $cacheCompression;
    private $cacheCompressionMethod;
    private $disableStampedeProtection;
    private $twig;
    private $invalidation;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function redisPrefix($value): static
    {
        $this->_usedProperties['redisPrefix'] = true;
        $this->redisPrefix = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function cacheCompression($value): static
    {
        $this->_usedProperties['cacheCompression'] = true;
        $this->cacheCompression = $value;

        return $this;
    }

    /**
     * @default 'gzip'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheCompressionMethod($value): static
    {
        $this->_usedProperties['cacheCompressionMethod'] = true;
        $this->cacheCompressionMethod = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableStampedeProtection($value): static
    {
        $this->_usedProperties['disableStampedeProtection'] = true;
        $this->disableStampedeProtection = $value;

        return $this;
    }

    public function twig(array $value = []): \Symfony\Config\Shopware\Cache\TwigConfig
    {
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\Shopware\Cache\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    public function invalidation(array $value = []): \Symfony\Config\Shopware\Cache\InvalidationConfig
    {
        if (null === $this->invalidation) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = new \Symfony\Config\Shopware\Cache\InvalidationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "invalidation()" has already been initialized. You cannot pass values the second time you call invalidation().');
        }

        return $this->invalidation;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('redis_prefix', $config)) {
            $this->_usedProperties['redisPrefix'] = true;
            $this->redisPrefix = $config['redis_prefix'];
            unset($config['redis_prefix']);
        }

        if (array_key_exists('cache_compression', $config)) {
            $this->_usedProperties['cacheCompression'] = true;
            $this->cacheCompression = $config['cache_compression'];
            unset($config['cache_compression']);
        }

        if (array_key_exists('cache_compression_method', $config)) {
            $this->_usedProperties['cacheCompressionMethod'] = true;
            $this->cacheCompressionMethod = $config['cache_compression_method'];
            unset($config['cache_compression_method']);
        }

        if (array_key_exists('disable_stampede_protection', $config)) {
            $this->_usedProperties['disableStampedeProtection'] = true;
            $this->disableStampedeProtection = $config['disable_stampede_protection'];
            unset($config['disable_stampede_protection']);
        }

        if (array_key_exists('twig', $config)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\Shopware\Cache\TwigConfig($config['twig']);
            unset($config['twig']);
        }

        if (array_key_exists('invalidation', $config)) {
            $this->_usedProperties['invalidation'] = true;
            $this->invalidation = new \Symfony\Config\Shopware\Cache\InvalidationConfig($config['invalidation']);
            unset($config['invalidation']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['redisPrefix'])) {
            $output['redis_prefix'] = $this->redisPrefix;
        }
        if (isset($this->_usedProperties['cacheCompression'])) {
            $output['cache_compression'] = $this->cacheCompression;
        }
        if (isset($this->_usedProperties['cacheCompressionMethod'])) {
            $output['cache_compression_method'] = $this->cacheCompressionMethod;
        }
        if (isset($this->_usedProperties['disableStampedeProtection'])) {
            $output['disable_stampede_protection'] = $this->disableStampedeProtection;
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }
        if (isset($this->_usedProperties['invalidation'])) {
            $output['invalidation'] = $this->invalidation->toArray();
        }

        return $output;
    }

}
