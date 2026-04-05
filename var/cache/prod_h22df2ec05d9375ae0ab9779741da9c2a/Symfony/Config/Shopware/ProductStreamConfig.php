<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProductStreamConfig 
{
    private $indexing;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function indexing($value): static
    {
        $this->_usedProperties['indexing'] = true;
        $this->indexing = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('indexing', $config)) {
            $this->_usedProperties['indexing'] = true;
            $this->indexing = $config['indexing'];
            unset($config['indexing']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['indexing'])) {
            $output['indexing'] = $this->indexing;
        }

        return $output;
    }

}
