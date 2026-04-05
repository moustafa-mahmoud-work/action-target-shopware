<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'UsageData'.\DIRECTORY_SEPARATOR.'GatewayConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class UsageDataConfig 
{
    private $collectionEnabled;
    private $gateway;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function collectionEnabled($value): static
    {
        $this->_usedProperties['collectionEnabled'] = true;
        $this->collectionEnabled = $value;

        return $this;
    }

    public function gateway(array $value = []): \Symfony\Config\Shopware\UsageData\GatewayConfig
    {
        if (null === $this->gateway) {
            $this->_usedProperties['gateway'] = true;
            $this->gateway = new \Symfony\Config\Shopware\UsageData\GatewayConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "gateway()" has already been initialized. You cannot pass values the second time you call gateway().');
        }

        return $this->gateway;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('collection_enabled', $config)) {
            $this->_usedProperties['collectionEnabled'] = true;
            $this->collectionEnabled = $config['collection_enabled'];
            unset($config['collection_enabled']);
        }

        if (array_key_exists('gateway', $config)) {
            $this->_usedProperties['gateway'] = true;
            $this->gateway = new \Symfony\Config\Shopware\UsageData\GatewayConfig($config['gateway']);
            unset($config['gateway']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['collectionEnabled'])) {
            $output['collection_enabled'] = $this->collectionEnabled;
        }
        if (isset($this->_usedProperties['gateway'])) {
            $output['gateway'] = $this->gateway->toArray();
        }

        return $output;
    }

}
