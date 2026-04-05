<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Cdn'.\DIRECTORY_SEPARATOR.'FastlyConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CdnConfig 
{
    private $url;
    private $strategy;
    private $fastly;
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
    public function strategy($value): static
    {
        $this->_usedProperties['strategy'] = true;
        $this->strategy = $value;

        return $this;
    }

    public function fastly(array $value = []): \Symfony\Config\Shopware\Cdn\FastlyConfig
    {
        if (null === $this->fastly) {
            $this->_usedProperties['fastly'] = true;
            $this->fastly = new \Symfony\Config\Shopware\Cdn\FastlyConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fastly()" has already been initialized. You cannot pass values the second time you call fastly().');
        }

        return $this->fastly;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('url', $config)) {
            $this->_usedProperties['url'] = true;
            $this->url = $config['url'];
            unset($config['url']);
        }

        if (array_key_exists('strategy', $config)) {
            $this->_usedProperties['strategy'] = true;
            $this->strategy = $config['strategy'];
            unset($config['strategy']);
        }

        if (array_key_exists('fastly', $config)) {
            $this->_usedProperties['fastly'] = true;
            $this->fastly = new \Symfony\Config\Shopware\Cdn\FastlyConfig($config['fastly']);
            unset($config['fastly']);
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
        if (isset($this->_usedProperties['strategy'])) {
            $output['strategy'] = $this->strategy;
        }
        if (isset($this->_usedProperties['fastly'])) {
            $output['fastly'] = $this->fastly->toArray();
        }

        return $output;
    }

}
