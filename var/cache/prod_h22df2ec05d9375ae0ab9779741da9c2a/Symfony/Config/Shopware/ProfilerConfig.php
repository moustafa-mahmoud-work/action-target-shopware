<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ProfilerConfig 
{
    private $integrations;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function integrations(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['integrations'] = true;
        $this->integrations = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('integrations', $config)) {
            $this->_usedProperties['integrations'] = true;
            $this->integrations = $config['integrations'];
            unset($config['integrations']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['integrations'])) {
            $output['integrations'] = $this->integrations;
        }

        return $output;
    }

}
