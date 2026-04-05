<?php

namespace Symfony\Config\Shopware\Messenger;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StatsConfig 
{
    private $enabled;
    private $timeSpan;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enabled($value): static
    {
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default 300
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function timeSpan($value): static
    {
        $this->_usedProperties['timeSpan'] = true;
        $this->timeSpan = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('time_span', $config)) {
            $this->_usedProperties['timeSpan'] = true;
            $this->timeSpan = $config['time_span'];
            unset($config['time_span']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['timeSpan'])) {
            $output['time_span'] = $this->timeSpan;
        }

        return $output;
    }

}
