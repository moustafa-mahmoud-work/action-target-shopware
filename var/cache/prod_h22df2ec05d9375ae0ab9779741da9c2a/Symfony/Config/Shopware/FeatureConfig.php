<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Feature'.\DIRECTORY_SEPARATOR.'FlagsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FeatureConfig 
{
    private $flags;
    private $_usedProperties = [];

    public function flags(string $name, array $value = []): \Symfony\Config\Shopware\Feature\FlagsConfig
    {
        if (!isset($this->flags[$name])) {
            $this->_usedProperties['flags'] = true;
            $this->flags[$name] = new \Symfony\Config\Shopware\Feature\FlagsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "flags()" has already been initialized. You cannot pass values the second time you call flags().');
        }

        return $this->flags[$name];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('flags', $config)) {
            $this->_usedProperties['flags'] = true;
            $this->flags = array_map(fn ($v) => \is_array($v) ? new \Symfony\Config\Shopware\Feature\FlagsConfig($v) : $v, $config['flags']);
            unset($config['flags']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['flags'])) {
            $output['flags'] = array_map(fn ($v) => $v instanceof \Symfony\Config\Shopware\Feature\FlagsConfig ? $v->toArray() : $v, $this->flags);
        }

        return $output;
    }

}
