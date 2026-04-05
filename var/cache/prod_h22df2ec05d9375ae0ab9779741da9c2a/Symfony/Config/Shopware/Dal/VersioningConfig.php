<?php

namespace Symfony\Config\Shopware\Dal;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class VersioningConfig 
{
    private $expireDays;
    private $_usedProperties = [];

    /**
     * @default 30
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function expireDays($value): static
    {
        $this->_usedProperties['expireDays'] = true;
        $this->expireDays = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('expire_days', $config)) {
            $this->_usedProperties['expireDays'] = true;
            $this->expireDays = $config['expire_days'];
            unset($config['expire_days']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['expireDays'])) {
            $output['expire_days'] = $this->expireDays;
        }

        return $output;
    }

}
