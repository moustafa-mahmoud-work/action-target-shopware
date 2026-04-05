<?php

namespace Symfony\Config\Shopware\Telemetry\Metrics\DefinitionsConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class LabelsConfig 
{
    private $allowedValues;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowedValues(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowedValues'] = true;
        $this->allowedValues = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('allowed_values', $config)) {
            $this->_usedProperties['allowedValues'] = true;
            $this->allowedValues = $config['allowed_values'];
            unset($config['allowed_values']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['allowedValues'])) {
            $output['allowed_values'] = $this->allowedValues;
        }

        return $output;
    }

}
