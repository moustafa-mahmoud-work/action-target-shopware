<?php

namespace Symfony\Config\Shopware\Api;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StoreConfig 
{
    private $contextLifetime;
    private $maxLimit;
    private $_usedProperties = [];

    /**
     * @default 'P1D'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function contextLifetime($value): static
    {
        $this->_usedProperties['contextLifetime'] = true;
        $this->contextLifetime = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function maxLimit($value): static
    {
        $this->_usedProperties['maxLimit'] = true;
        $this->maxLimit = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('context_lifetime', $config)) {
            $this->_usedProperties['contextLifetime'] = true;
            $this->contextLifetime = $config['context_lifetime'];
            unset($config['context_lifetime']);
        }

        if (array_key_exists('max_limit', $config)) {
            $this->_usedProperties['maxLimit'] = true;
            $this->maxLimit = $config['max_limit'];
            unset($config['max_limit']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['contextLifetime'])) {
            $output['context_lifetime'] = $this->contextLifetime;
        }
        if (isset($this->_usedProperties['maxLimit'])) {
            $output['max_limit'] = $this->maxLimit;
        }

        return $output;
    }

}
