<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class WebhookConfig 
{
    private $failureStrategy;
    private $_usedProperties = [];

    /**
     * @experimental stableVersion:v6.8.0 feature:WEBHOOK_FAILURE_STRATEGY this is a temporary solution until webhooks are refactored with a circuit breaker implementation
     * @default 'disable_on_threshold'
     * @param ParamConfigurator|'disable_on_threshold'|'ignore' $value
     * @return $this
     */
    public function failureStrategy($value): static
    {
        $this->_usedProperties['failureStrategy'] = true;
        $this->failureStrategy = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('failure_strategy', $config)) {
            $this->_usedProperties['failureStrategy'] = true;
            $this->failureStrategy = $config['failure_strategy'];
            unset($config['failure_strategy']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['failureStrategy'])) {
            $output['failure_strategy'] = $this->failureStrategy;
        }

        return $output;
    }

}
