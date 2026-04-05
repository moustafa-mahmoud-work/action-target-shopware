<?php

namespace Symfony\Config\Shopware\Messenger;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ScheduledTaskConfig 
{
    private $requeueTimeout;
    private $_usedProperties = [];

    /**
     * @default 12
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function requeueTimeout($value): static
    {
        $this->_usedProperties['requeueTimeout'] = true;
        $this->requeueTimeout = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('requeue_timeout', $config)) {
            $this->_usedProperties['requeueTimeout'] = true;
            $this->requeueTimeout = $config['requeue_timeout'];
            unset($config['requeue_timeout']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['requeueTimeout'])) {
            $output['requeue_timeout'] = $this->requeueTimeout;
        }

        return $output;
    }

}
