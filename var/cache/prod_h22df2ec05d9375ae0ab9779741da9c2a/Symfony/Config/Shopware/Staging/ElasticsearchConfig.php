<?php

namespace Symfony\Config\Shopware\Staging;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ElasticsearchConfig 
{
    private $checkForExistence;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function checkForExistence($value): static
    {
        $this->_usedProperties['checkForExistence'] = true;
        $this->checkForExistence = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('check_for_existence', $config)) {
            $this->_usedProperties['checkForExistence'] = true;
            $this->checkForExistence = $config['check_for_existence'];
            unset($config['check_for_existence']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['checkForExistence'])) {
            $output['check_for_existence'] = $this->checkForExistence;
        }

        return $output;
    }

}
