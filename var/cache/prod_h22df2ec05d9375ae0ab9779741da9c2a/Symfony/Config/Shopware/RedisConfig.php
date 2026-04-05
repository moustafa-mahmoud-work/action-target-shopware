<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Redis'.\DIRECTORY_SEPARATOR.'ConnectionsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RedisConfig 
{
    private $connections;
    private $_usedProperties = [];

    public function connections(string $name, array $value = []): \Symfony\Config\Shopware\Redis\ConnectionsConfig
    {
        if (!isset($this->connections[$name])) {
            $this->_usedProperties['connections'] = true;
            $this->connections[$name] = new \Symfony\Config\Shopware\Redis\ConnectionsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "connections()" has already been initialized. You cannot pass values the second time you call connections().');
        }

        return $this->connections[$name];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('connections', $config)) {
            $this->_usedProperties['connections'] = true;
            $this->connections = array_map(fn ($v) => new \Symfony\Config\Shopware\Redis\ConnectionsConfig($v), $config['connections']);
            unset($config['connections']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['connections'])) {
            $output['connections'] = array_map(fn ($v) => $v->toArray(), $this->connections);
        }

        return $output;
    }

}
