<?php

namespace Symfony\Config\Shopware\Api;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StaticTokenConfig 
{
    private $healthCheck;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function healthCheck($value): static
    {
        $this->_usedProperties['healthCheck'] = true;
        $this->healthCheck = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('health_check', $config)) {
            $this->_usedProperties['healthCheck'] = true;
            $this->healthCheck = $config['health_check'];
            unset($config['health_check']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['healthCheck'])) {
            $output['health_check'] = $this->healthCheck;
        }

        return $output;
    }

}
