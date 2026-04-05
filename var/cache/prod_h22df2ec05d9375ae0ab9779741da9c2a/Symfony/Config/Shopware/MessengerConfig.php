<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Messenger'.\DIRECTORY_SEPARATOR.'ScheduledTaskConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Messenger'.\DIRECTORY_SEPARATOR.'StatsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MessengerConfig 
{
    private $routingOverwrite;
    private $enforceMessageSize;
    private $messageMaxKibSize;
    private $scheduledTask;
    private $stats;
    private $_usedProperties = [];

    /**
     * @return $this
     */
    public function routingOverwrite(string $name, mixed $value): static
    {
        $this->_usedProperties['routingOverwrite'] = true;
        $this->routingOverwrite[$name] = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enforceMessageSize($value): static
    {
        $this->_usedProperties['enforceMessageSize'] = true;
        $this->enforceMessageSize = $value;

        return $this;
    }

    /**
     * @default 1024
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function messageMaxKibSize($value): static
    {
        $this->_usedProperties['messageMaxKibSize'] = true;
        $this->messageMaxKibSize = $value;

        return $this;
    }

    public function scheduledTask(array $value = []): \Symfony\Config\Shopware\Messenger\ScheduledTaskConfig
    {
        if (null === $this->scheduledTask) {
            $this->_usedProperties['scheduledTask'] = true;
            $this->scheduledTask = new \Symfony\Config\Shopware\Messenger\ScheduledTaskConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "scheduledTask()" has already been initialized. You cannot pass values the second time you call scheduledTask().');
        }

        return $this->scheduledTask;
    }

    public function stats(array $value = []): \Symfony\Config\Shopware\Messenger\StatsConfig
    {
        if (null === $this->stats) {
            $this->_usedProperties['stats'] = true;
            $this->stats = new \Symfony\Config\Shopware\Messenger\StatsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "stats()" has already been initialized. You cannot pass values the second time you call stats().');
        }

        return $this->stats;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('routing_overwrite', $config)) {
            $this->_usedProperties['routingOverwrite'] = true;
            $this->routingOverwrite = $config['routing_overwrite'];
            unset($config['routing_overwrite']);
        }

        if (array_key_exists('enforce_message_size', $config)) {
            $this->_usedProperties['enforceMessageSize'] = true;
            $this->enforceMessageSize = $config['enforce_message_size'];
            unset($config['enforce_message_size']);
        }

        if (array_key_exists('message_max_kib_size', $config)) {
            $this->_usedProperties['messageMaxKibSize'] = true;
            $this->messageMaxKibSize = $config['message_max_kib_size'];
            unset($config['message_max_kib_size']);
        }

        if (array_key_exists('scheduled_task', $config)) {
            $this->_usedProperties['scheduledTask'] = true;
            $this->scheduledTask = new \Symfony\Config\Shopware\Messenger\ScheduledTaskConfig($config['scheduled_task']);
            unset($config['scheduled_task']);
        }

        if (array_key_exists('stats', $config)) {
            $this->_usedProperties['stats'] = true;
            $this->stats = new \Symfony\Config\Shopware\Messenger\StatsConfig($config['stats']);
            unset($config['stats']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['routingOverwrite'])) {
            $output['routing_overwrite'] = $this->routingOverwrite;
        }
        if (isset($this->_usedProperties['enforceMessageSize'])) {
            $output['enforce_message_size'] = $this->enforceMessageSize;
        }
        if (isset($this->_usedProperties['messageMaxKibSize'])) {
            $output['message_max_kib_size'] = $this->messageMaxKibSize;
        }
        if (isset($this->_usedProperties['scheduledTask'])) {
            $output['scheduled_task'] = $this->scheduledTask->toArray();
        }
        if (isset($this->_usedProperties['stats'])) {
            $output['stats'] = $this->stats->toArray();
        }

        return $output;
    }

}
