<?php

namespace Symfony\Config\Shopware\Filesystem;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ThemeConfig 
{
    private $type;
    private $url;
    private $visibility;
    private $config;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

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
    public function visibility($value): static
    {
        $this->_usedProperties['visibility'] = true;
        $this->visibility = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function config(mixed $value): static
    {
        $this->_usedProperties['config'] = true;
        $this->config = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('type', $config)) {
            $this->_usedProperties['type'] = true;
            $this->type = $config['type'];
            unset($config['type']);
        }

        if (array_key_exists('url', $config)) {
            $this->_usedProperties['url'] = true;
            $this->url = $config['url'];
            unset($config['url']);
        }

        if (array_key_exists('visibility', $config)) {
            $this->_usedProperties['visibility'] = true;
            $this->visibility = $config['visibility'];
            unset($config['visibility']);
        }

        if (array_key_exists('config', $config)) {
            $this->_usedProperties['config'] = true;
            $this->config = $config['config'];
            unset($config['config']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['url'])) {
            $output['url'] = $this->url;
        }
        if (isset($this->_usedProperties['visibility'])) {
            $output['visibility'] = $this->visibility;
        }
        if (isset($this->_usedProperties['config'])) {
            $output['config'] = $this->config;
        }

        return $output;
    }

}
