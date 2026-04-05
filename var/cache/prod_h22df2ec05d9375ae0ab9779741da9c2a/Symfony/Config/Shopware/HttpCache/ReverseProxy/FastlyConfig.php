<?php

namespace Symfony\Config\Shopware\HttpCache\ReverseProxy;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FastlyConfig 
{
    private $enabled;
    private $apiKey;
    private $instanceTag;
    private $serviceId;
    private $softPurge;
    private $tagPrefix;
    private $_usedProperties = [];

    /**
     * @default false
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
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function apiKey($value): static
    {
        $this->_usedProperties['apiKey'] = true;
        $this->apiKey = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function instanceTag($value): static
    {
        $this->_usedProperties['instanceTag'] = true;
        $this->instanceTag = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function serviceId($value): static
    {
        $this->_usedProperties['serviceId'] = true;
        $this->serviceId = $value;

        return $this;
    }

    /**
     * @default '0'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function softPurge($value): static
    {
        $this->_usedProperties['softPurge'] = true;
        $this->softPurge = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tagPrefix($value): static
    {
        $this->_usedProperties['tagPrefix'] = true;
        $this->tagPrefix = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('api_key', $config)) {
            $this->_usedProperties['apiKey'] = true;
            $this->apiKey = $config['api_key'];
            unset($config['api_key']);
        }

        if (array_key_exists('instance_tag', $config)) {
            $this->_usedProperties['instanceTag'] = true;
            $this->instanceTag = $config['instance_tag'];
            unset($config['instance_tag']);
        }

        if (array_key_exists('service_id', $config)) {
            $this->_usedProperties['serviceId'] = true;
            $this->serviceId = $config['service_id'];
            unset($config['service_id']);
        }

        if (array_key_exists('soft_purge', $config)) {
            $this->_usedProperties['softPurge'] = true;
            $this->softPurge = $config['soft_purge'];
            unset($config['soft_purge']);
        }

        if (array_key_exists('tag_prefix', $config)) {
            $this->_usedProperties['tagPrefix'] = true;
            $this->tagPrefix = $config['tag_prefix'];
            unset($config['tag_prefix']);
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
        if (isset($this->_usedProperties['apiKey'])) {
            $output['api_key'] = $this->apiKey;
        }
        if (isset($this->_usedProperties['instanceTag'])) {
            $output['instance_tag'] = $this->instanceTag;
        }
        if (isset($this->_usedProperties['serviceId'])) {
            $output['service_id'] = $this->serviceId;
        }
        if (isset($this->_usedProperties['softPurge'])) {
            $output['soft_purge'] = $this->softPurge;
        }
        if (isset($this->_usedProperties['tagPrefix'])) {
            $output['tag_prefix'] = $this->tagPrefix;
        }

        return $output;
    }

}
