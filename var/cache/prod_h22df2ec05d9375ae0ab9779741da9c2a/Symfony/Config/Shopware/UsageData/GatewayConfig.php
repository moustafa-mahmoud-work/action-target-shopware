<?php

namespace Symfony\Config\Shopware\UsageData;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class GatewayConfig 
{
    private $dispatchEnabled;
    private $baseUri;
    private $batchSize;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dispatchEnabled($value): static
    {
        $this->_usedProperties['dispatchEnabled'] = true;
        $this->dispatchEnabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function baseUri($value): static
    {
        $this->_usedProperties['baseUri'] = true;
        $this->baseUri = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function batchSize($value): static
    {
        $this->_usedProperties['batchSize'] = true;
        $this->batchSize = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('dispatch_enabled', $config)) {
            $this->_usedProperties['dispatchEnabled'] = true;
            $this->dispatchEnabled = $config['dispatch_enabled'];
            unset($config['dispatch_enabled']);
        }

        if (array_key_exists('base_uri', $config)) {
            $this->_usedProperties['baseUri'] = true;
            $this->baseUri = $config['base_uri'];
            unset($config['base_uri']);
        }

        if (array_key_exists('batch_size', $config)) {
            $this->_usedProperties['batchSize'] = true;
            $this->batchSize = $config['batch_size'];
            unset($config['batch_size']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['dispatchEnabled'])) {
            $output['dispatch_enabled'] = $this->dispatchEnabled;
        }
        if (isset($this->_usedProperties['baseUri'])) {
            $output['base_uri'] = $this->baseUri;
        }
        if (isset($this->_usedProperties['batchSize'])) {
            $output['batch_size'] = $this->batchSize;
        }

        return $output;
    }

}
