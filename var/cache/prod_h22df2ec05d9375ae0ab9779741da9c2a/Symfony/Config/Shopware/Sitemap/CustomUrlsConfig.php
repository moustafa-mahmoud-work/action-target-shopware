<?php

namespace Symfony\Config\Shopware\Sitemap;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CustomUrlsConfig 
{
    private $url;
    private $lastMod;
    private $changeFreq;
    private $priority;
    private $salesChannelId;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function url($value): static
    {
        $this->_usedProperties['url'] = true;
        $this->url = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function lastMod($value): static
    {
        $this->_usedProperties['lastMod'] = true;
        $this->lastMod = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|'always'|'hourly'|'daily'|'weekly'|'monthly'|'yearly' $value
     * @return $this
     */
    public function changeFreq($value): static
    {
        $this->_usedProperties['changeFreq'] = true;
        $this->changeFreq = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|float $value
     * @return $this
     */
    public function priority($value): static
    {
        $this->_usedProperties['priority'] = true;
        $this->priority = $value;

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
        if (array_key_exists('url', $config)) {
            $this->_usedProperties['url'] = true;
            $this->url = $config['url'];
            unset($config['url']);
        }

        if (array_key_exists('lastMod', $config)) {
            $this->_usedProperties['lastMod'] = true;
            $this->lastMod = $config['lastMod'];
            unset($config['lastMod']);
        }

        if (array_key_exists('changeFreq', $config)) {
            $this->_usedProperties['changeFreq'] = true;
            $this->changeFreq = $config['changeFreq'];
            unset($config['changeFreq']);
        }

        if (array_key_exists('priority', $config)) {
            $this->_usedProperties['priority'] = true;
            $this->priority = $config['priority'];
            unset($config['priority']);
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
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['lastMod'])) {
            $output['lastMod'] = $this->lastMod;
        }
        if (isset($this->_usedProperties['changeFreq'])) {
            $output['changeFreq'] = $this->changeFreq;
        }
        if (isset($this->_usedProperties['priority'])) {
            $output['priority'] = $this->priority;
        }
        if (isset($this->_usedProperties['salesChannelId'])) {
            $output['salesChannelId'] = $this->salesChannelId;
        }

        return $output;
    }

}
