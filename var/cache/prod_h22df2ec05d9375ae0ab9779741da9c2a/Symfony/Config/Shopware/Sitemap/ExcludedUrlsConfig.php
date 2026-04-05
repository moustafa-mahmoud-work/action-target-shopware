<?php

namespace Symfony\Config\Shopware\Sitemap;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ExcludedUrlsConfig 
{
    private $resource;
    private $identifier;
    private $salesChannelId;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function resource($value): static
    {
        $this->_usedProperties['resource'] = true;
        $this->resource = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function identifier($value): static
    {
        $this->_usedProperties['identifier'] = true;
        $this->identifier = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function salesChannelId($value): static
    {
        $this->_usedProperties['salesChannelId'] = true;
        $this->salesChannelId = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('resource', $config)) {
            $this->_usedProperties['resource'] = true;
            $this->resource = $config['resource'];
            unset($config['resource']);
        }

        if (array_key_exists('identifier', $config)) {
            $this->_usedProperties['identifier'] = true;
            $this->identifier = $config['identifier'];
            unset($config['identifier']);
        }

        if (array_key_exists('salesChannelId', $config)) {
            $this->_usedProperties['salesChannelId'] = true;
            $this->salesChannelId = $config['salesChannelId'];
            unset($config['salesChannelId']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['resource'])) {
            $output['resource'] = $this->resource;
        }
        if (isset($this->_usedProperties['identifier'])) {
            $output['identifier'] = $this->identifier;
        }
        if (isset($this->_usedProperties['salesChannelId'])) {
            $output['salesChannelId'] = $this->salesChannelId;
        }

        return $output;
    }

}
