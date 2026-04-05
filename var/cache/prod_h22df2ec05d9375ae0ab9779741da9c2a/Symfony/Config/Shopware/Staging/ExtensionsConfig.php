<?php

namespace Symfony\Config\Shopware\Staging;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExtensionsConfig 
{
    private $disable;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function disable(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['disable'] = true;
        $this->disable = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('disable', $config)) {
            $this->_usedProperties['disable'] = true;
            $this->disable = $config['disable'];
            unset($config['disable']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['disable'])) {
            $output['disable'] = $this->disable;
        }

        return $output;
    }

}
