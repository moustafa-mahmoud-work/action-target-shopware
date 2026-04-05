<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AdminWorkerConfig 
{
    private $transports;
    private $pollInterval;
    private $enableAdminWorker;
    private $enableQueueStatsWorker;
    private $enableNotificationWorker;
    private $memoryLimit;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function transports(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['transports'] = true;
        $this->transports = $value;

        return $this;
    }

    /**
     * @default 20
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function pollInterval($value): static
    {
        $this->_usedProperties['pollInterval'] = true;
        $this->pollInterval = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableAdminWorker($value): static
    {
        $this->_usedProperties['enableAdminWorker'] = true;
        $this->enableAdminWorker = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @deprecated Since shopware/core 6.8.0: The "enable_queue_stats_worker" option is deprecated and will be removed in 6.8.0. The increment-based message queue statistics will be removed, please use "shopware.messenger.stats.enabled" as alternative.
     * @return $this
     */
    public function enableQueueStatsWorker($value): static
    {
        $this->_usedProperties['enableQueueStatsWorker'] = true;
        $this->enableQueueStatsWorker = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableNotificationWorker($value): static
    {
        $this->_usedProperties['enableNotificationWorker'] = true;
        $this->enableNotificationWorker = $value;

        return $this;
    }

    /**
     * @default '128M'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function memoryLimit($value): static
    {
        $this->_usedProperties['memoryLimit'] = true;
        $this->memoryLimit = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('transports', $config)) {
            $this->_usedProperties['transports'] = true;
            $this->transports = $config['transports'];
            unset($config['transports']);
        }

        if (array_key_exists('poll_interval', $config)) {
            $this->_usedProperties['pollInterval'] = true;
            $this->pollInterval = $config['poll_interval'];
            unset($config['poll_interval']);
        }

        if (array_key_exists('enable_admin_worker', $config)) {
            $this->_usedProperties['enableAdminWorker'] = true;
            $this->enableAdminWorker = $config['enable_admin_worker'];
            unset($config['enable_admin_worker']);
        }

        if (array_key_exists('enable_queue_stats_worker', $config)) {
            $this->_usedProperties['enableQueueStatsWorker'] = true;
            $this->enableQueueStatsWorker = $config['enable_queue_stats_worker'];
            unset($config['enable_queue_stats_worker']);
        }

        if (array_key_exists('enable_notification_worker', $config)) {
            $this->_usedProperties['enableNotificationWorker'] = true;
            $this->enableNotificationWorker = $config['enable_notification_worker'];
            unset($config['enable_notification_worker']);
        }

        if (array_key_exists('memory_limit', $config)) {
            $this->_usedProperties['memoryLimit'] = true;
            $this->memoryLimit = $config['memory_limit'];
            unset($config['memory_limit']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['transports'])) {
            $output['transports'] = $this->transports;
        }
        if (isset($this->_usedProperties['pollInterval'])) {
            $output['poll_interval'] = $this->pollInterval;
        }
        if (isset($this->_usedProperties['enableAdminWorker'])) {
            $output['enable_admin_worker'] = $this->enableAdminWorker;
        }
        if (isset($this->_usedProperties['enableQueueStatsWorker'])) {
            $output['enable_queue_stats_worker'] = $this->enableQueueStatsWorker;
        }
        if (isset($this->_usedProperties['enableNotificationWorker'])) {
            $output['enable_notification_worker'] = $this->enableNotificationWorker;
        }
        if (isset($this->_usedProperties['memoryLimit'])) {
            $output['memory_limit'] = $this->memoryLimit;
        }

        return $output;
    }

}
