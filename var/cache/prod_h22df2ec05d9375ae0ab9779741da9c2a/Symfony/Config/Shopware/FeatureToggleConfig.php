<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FeatureToggleConfig 
{
    private $enable;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enable($value): static
    {
        $this->_usedProperties['enable'] = true;
        $this->enable = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enable', $config)) {
            $this->_usedProperties['enable'] = true;
            $this->enable = $config['enable'];
            unset($config['enable']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enable'])) {
            $output['enable'] = $this->enable;
        }

        return $output;
    }

}
