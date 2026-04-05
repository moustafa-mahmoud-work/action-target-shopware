<?php

namespace Symfony\Config\Shopware\Cart;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Storage'.\DIRECTORY_SEPARATOR.'ConfigConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StorageConfig 
{
    private $type;
    private $config;
    private $_usedProperties = [];

    /**
     * @default 'mysql'
     * @param ParamConfigurator|'mysql'|'redis' $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    public function config(array $value = []): \Symfony\Config\Shopware\Cart\Storage\ConfigConfig
    {
        if (null === $this->config) {
            $this->_usedProperties['config'] = true;
            $this->config = new \Symfony\Config\Shopware\Cart\Storage\ConfigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "config()" has already been initialized. You cannot pass values the second time you call config().');
        }

        return $this->config;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('type', $config)) {
            $this->_usedProperties['type'] = true;
            $this->type = $config['type'];
            unset($config['type']);
        }

        if (array_key_exists('config', $config)) {
            $this->_usedProperties['config'] = true;
            $this->config = new \Symfony\Config\Shopware\Cart\Storage\ConfigConfig($config['config']);
            unset($config['config']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['config'])) {
            $output['config'] = $this->config->toArray();
        }

        return $output;
    }

}
