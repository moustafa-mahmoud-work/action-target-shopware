<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'NumberRange'.\DIRECTORY_SEPARATOR.'ConfigConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class NumberRangeConfig 
{
    private $incrementStorage;
    private $config;
    private $_usedProperties = [];

    /**
     * @default 'mysql'
     * @param ParamConfigurator|'mysql'|'redis' $value
     * @return $this
     */
    public function incrementStorage($value): static
    {
        $this->_usedProperties['incrementStorage'] = true;
        $this->incrementStorage = $value;

        return $this;
    }

    public function config(array $value = []): \Symfony\Config\Shopware\NumberRange\ConfigConfig
    {
        if (null === $this->config) {
            $this->_usedProperties['config'] = true;
            $this->config = new \Symfony\Config\Shopware\NumberRange\ConfigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "config()" has already been initialized. You cannot pass values the second time you call config().');
        }

        return $this->config;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('increment_storage', $config)) {
            $this->_usedProperties['incrementStorage'] = true;
            $this->incrementStorage = $config['increment_storage'];
            unset($config['increment_storage']);
        }

        if (array_key_exists('config', $config)) {
            $this->_usedProperties['config'] = true;
            $this->config = new \Symfony\Config\Shopware\NumberRange\ConfigConfig($config['config']);
            unset($config['config']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['incrementStorage'])) {
            $output['increment_storage'] = $this->incrementStorage;
        }
        if (isset($this->_usedProperties['config'])) {
            $output['config'] = $this->config->toArray();
        }

        return $output;
    }

}
