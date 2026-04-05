<?php

namespace Symfony\Config\Shopware\HttpCache;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DefaultPoliciesConfig 
{
    private $cacheable;
    private $uncacheable;
    private $_usedProperties = [];

    /**
     * Policy name to use for cacheable responses
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cacheable($value): static
    {
        $this->_usedProperties['cacheable'] = true;
        $this->cacheable = $value;

        return $this;
    }

    /**
     * Policy name to use for uncacheable responses
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uncacheable($value): static
    {
        $this->_usedProperties['uncacheable'] = true;
        $this->uncacheable = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('cacheable', $config)) {
            $this->_usedProperties['cacheable'] = true;
            $this->cacheable = $config['cacheable'];
            unset($config['cacheable']);
        }

        if (array_key_exists('uncacheable', $config)) {
            $this->_usedProperties['uncacheable'] = true;
            $this->uncacheable = $config['uncacheable'];
            unset($config['uncacheable']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cacheable'])) {
            $output['cacheable'] = $this->cacheable;
        }
        if (isset($this->_usedProperties['uncacheable'])) {
            $output['uncacheable'] = $this->uncacheable;
        }

        return $output;
    }

}
