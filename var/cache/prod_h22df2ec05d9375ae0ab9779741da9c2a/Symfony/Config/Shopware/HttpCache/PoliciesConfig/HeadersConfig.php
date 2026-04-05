<?php

namespace Symfony\Config\Shopware\HttpCache\PoliciesConfig;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Headers'.\DIRECTORY_SEPARATOR.'CacheControlConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HeadersConfig 
{
    private $cacheControl;
    private $_usedProperties = [];

    public function cacheControl(array $value = []): \Symfony\Config\Shopware\HttpCache\PoliciesConfig\Headers\CacheControlConfig
    {
        if (null === $this->cacheControl) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\Shopware\HttpCache\PoliciesConfig\Headers\CacheControlConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cacheControl()" has already been initialized. You cannot pass values the second time you call cacheControl().');
        }

        return $this->cacheControl;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('cache_control', $config)) {
            $this->_usedProperties['cacheControl'] = true;
            $this->cacheControl = new \Symfony\Config\Shopware\HttpCache\PoliciesConfig\Headers\CacheControlConfig($config['cache_control']);
            unset($config['cache_control']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cacheControl'])) {
            $output['cache_control'] = $this->cacheControl->toArray();
        }

        return $output;
    }

}
