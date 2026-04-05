<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Dal'.\DIRECTORY_SEPARATOR.'VersioningConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DalConfig 
{
    private $batchSize;
    private $maxRulePrices;
    private $versioning;
    private $_usedProperties = [];

    /**
     * @default 125
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function batchSize($value): static
    {
        $this->_usedProperties['batchSize'] = true;
        $this->batchSize = $value;

        return $this;
    }

    /**
     * @default 100
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxRulePrices($value): static
    {
        $this->_usedProperties['maxRulePrices'] = true;
        $this->maxRulePrices = $value;

        return $this;
    }

    public function versioning(array $value = []): \Symfony\Config\Shopware\Dal\VersioningConfig
    {
        if (null === $this->versioning) {
            $this->_usedProperties['versioning'] = true;
            $this->versioning = new \Symfony\Config\Shopware\Dal\VersioningConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "versioning()" has already been initialized. You cannot pass values the second time you call versioning().');
        }

        return $this->versioning;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('batch_size', $config)) {
            $this->_usedProperties['batchSize'] = true;
            $this->batchSize = $config['batch_size'];
            unset($config['batch_size']);
        }

        if (array_key_exists('max_rule_prices', $config)) {
            $this->_usedProperties['maxRulePrices'] = true;
            $this->maxRulePrices = $config['max_rule_prices'];
            unset($config['max_rule_prices']);
        }

        if (array_key_exists('versioning', $config)) {
            $this->_usedProperties['versioning'] = true;
            $this->versioning = new \Symfony\Config\Shopware\Dal\VersioningConfig($config['versioning']);
            unset($config['versioning']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['batchSize'])) {
            $output['batch_size'] = $this->batchSize;
        }
        if (isset($this->_usedProperties['maxRulePrices'])) {
            $output['max_rule_prices'] = $this->maxRulePrices;
        }
        if (isset($this->_usedProperties['versioning'])) {
            $output['versioning'] = $this->versioning->toArray();
        }

        return $output;
    }

}
