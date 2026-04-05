<?php

namespace Symfony\Config\Shopware\HttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'ReverseProxy'.\DIRECTORY_SEPARATOR.'PurgeAllConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'ReverseProxy'.\DIRECTORY_SEPARATOR.'FastlyConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ReverseProxyConfig 
{
    private $enabled;
    private $useVarnishXkey;
    private $hosts;
    private $maxParallelInvalidations;
    private $banMethod;
    private $banHeaders;
    private $purgeAll;
    private $fastly;
    private $_usedProperties = [];

    /**
     * @default null
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
     * @default false
     * @param ParamConfigurator|bool $value
     * @deprecated Since shopware/core 6.8.0: The "use_varnish_xkey" option has no effect anymore and therefore will be removed in 6.8.0.
     * @return $this
     */
    public function useVarnishXkey($value): static
    {
        $this->_usedProperties['useVarnishXkey'] = true;
        $this->useVarnishXkey = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function hosts(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @default 2
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxParallelInvalidations($value): static
    {
        $this->_usedProperties['maxParallelInvalidations'] = true;
        $this->maxParallelInvalidations = $value;

        return $this;
    }

    /**
     * @default 'BAN'
     * @param ParamConfigurator|mixed $value
     * @deprecated Since shopware/core 6.8.0: The "ban_method" option has no effect anymore and therefore will be removed in 6.8.0.
     * @return $this
     */
    public function banMethod($value): static
    {
        $this->_usedProperties['banMethod'] = true;
        $this->banMethod = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function banHeaders(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['banHeaders'] = true;
        $this->banHeaders = $value;

        return $this;
    }

    /**
     * @deprecated Since shopware/core 6.8.0: The "purge_all" option has no effect anymore and therefore will be removed in 6.8.0.
     */
    public function purgeAll(array $value = []): \Symfony\Config\Shopware\HttpCache\ReverseProxy\PurgeAllConfig
    {
        if (null === $this->purgeAll) {
            $this->_usedProperties['purgeAll'] = true;
            $this->purgeAll = new \Symfony\Config\Shopware\HttpCache\ReverseProxy\PurgeAllConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "purgeAll()" has already been initialized. You cannot pass values the second time you call purgeAll().');
        }

        return $this->purgeAll;
    }

    public function fastly(array $value = []): \Symfony\Config\Shopware\HttpCache\ReverseProxy\FastlyConfig
    {
        if (null === $this->fastly) {
            $this->_usedProperties['fastly'] = true;
            $this->fastly = new \Symfony\Config\Shopware\HttpCache\ReverseProxy\FastlyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fastly()" has already been initialized. You cannot pass values the second time you call fastly().');
        }

        return $this->fastly;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('use_varnish_xkey', $config)) {
            $this->_usedProperties['useVarnishXkey'] = true;
            $this->useVarnishXkey = $config['use_varnish_xkey'];
            unset($config['use_varnish_xkey']);
        }

        if (array_key_exists('hosts', $config)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $config['hosts'];
            unset($config['hosts']);
        }

        if (array_key_exists('max_parallel_invalidations', $config)) {
            $this->_usedProperties['maxParallelInvalidations'] = true;
            $this->maxParallelInvalidations = $config['max_parallel_invalidations'];
            unset($config['max_parallel_invalidations']);
        }

        if (array_key_exists('ban_method', $config)) {
            $this->_usedProperties['banMethod'] = true;
            $this->banMethod = $config['ban_method'];
            unset($config['ban_method']);
        }

        if (array_key_exists('ban_headers', $config)) {
            $this->_usedProperties['banHeaders'] = true;
            $this->banHeaders = $config['ban_headers'];
            unset($config['ban_headers']);
        }

        if (array_key_exists('purge_all', $config)) {
            $this->_usedProperties['purgeAll'] = true;
            $this->purgeAll = new \Symfony\Config\Shopware\HttpCache\ReverseProxy\PurgeAllConfig($config['purge_all']);
            unset($config['purge_all']);
        }

        if (array_key_exists('fastly', $config)) {
            $this->_usedProperties['fastly'] = true;
            $this->fastly = new \Symfony\Config\Shopware\HttpCache\ReverseProxy\FastlyConfig($config['fastly']);
            unset($config['fastly']);
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
        if (isset($this->_usedProperties['useVarnishXkey'])) {
            $output['use_varnish_xkey'] = $this->useVarnishXkey;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['maxParallelInvalidations'])) {
            $output['max_parallel_invalidations'] = $this->maxParallelInvalidations;
        }
        if (isset($this->_usedProperties['banMethod'])) {
            $output['ban_method'] = $this->banMethod;
        }
        if (isset($this->_usedProperties['banHeaders'])) {
            $output['ban_headers'] = $this->banHeaders;
        }
        if (isset($this->_usedProperties['purgeAll'])) {
            $output['purge_all'] = $this->purgeAll->toArray();
        }
        if (isset($this->_usedProperties['fastly'])) {
            $output['fastly'] = $this->fastly->toArray();
        }

        return $output;
    }

}
