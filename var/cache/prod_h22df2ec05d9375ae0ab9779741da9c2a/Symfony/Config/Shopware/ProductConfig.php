<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProductConfig 
{
    private $allowedTypes;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowedTypes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowedTypes'] = true;
        $this->allowedTypes = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('allowed_types', $config)) {
            $this->_usedProperties['allowedTypes'] = true;
            $this->allowedTypes = $config['allowed_types'];
            unset($config['allowed_types']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['allowedTypes'])) {
            $output['allowed_types'] = $this->allowedTypes;
        }

        return $output;
    }

}
