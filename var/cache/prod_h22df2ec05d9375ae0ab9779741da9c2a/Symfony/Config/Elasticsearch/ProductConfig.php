<?php

namespace Symfony\Config\Elasticsearch;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProductConfig 
{
    private $customFieldsMapping;
    private $excludeSource;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function customFieldsMapping(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['customFieldsMapping'] = true;
        $this->customFieldsMapping = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function excludeSource($value): static
    {
        $this->_usedProperties['excludeSource'] = true;
        $this->excludeSource = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('custom_fields_mapping', $config)) {
            $this->_usedProperties['customFieldsMapping'] = true;
            $this->customFieldsMapping = $config['custom_fields_mapping'];
            unset($config['custom_fields_mapping']);
        }

        if (array_key_exists('exclude_source', $config)) {
            $this->_usedProperties['excludeSource'] = true;
            $this->excludeSource = $config['exclude_source'];
            unset($config['exclude_source']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['customFieldsMapping'])) {
            $output['custom_fields_mapping'] = $this->customFieldsMapping;
        }
        if (isset($this->_usedProperties['excludeSource'])) {
            $output['exclude_source'] = $this->excludeSource;
        }

        return $output;
    }

}
