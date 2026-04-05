<?php

namespace Symfony\Config\Shopware\HttpCache\ReverseProxy;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PurgeAllConfig 
{
    private $banMethod;
    private $banHeaders;
    private $urls;
    private $_usedProperties = [];

    /**
     * @default 'BAN'
     * @param ParamConfigurator|mixed $value
     * @deprecated Since shopware/core 6.8.0: The "ban_method" option has no effect anymore and therefore will be removed in 6.8.0.
     * @return $this
     */
    public function banMethod($value): static
    {
        $this->_usedProperties['banMethod'] = true;
        $this->banMethod = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function banHeaders(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['banHeaders'] = true;
        $this->banHeaders = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function urls(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['urls'] = true;
        $this->urls = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('ban_method', $config)) {
            $this->_usedProperties['banMethod'] = true;
            $this->banMethod = $config['ban_method'];
            unset($config['ban_method']);
        }

        if (array_key_exists('ban_headers', $config)) {
            $this->_usedProperties['banHeaders'] = true;
            $this->banHeaders = $config['ban_headers'];
            unset($config['ban_headers']);
        }

        if (array_key_exists('urls', $config)) {
            $this->_usedProperties['urls'] = true;
            $this->urls = $config['urls'];
            unset($config['urls']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['banMethod'])) {
            $output['ban_method'] = $this->banMethod;
        }
        if (isset($this->_usedProperties['banHeaders'])) {
            $output['ban_headers'] = $this->banHeaders;
        }
        if (isset($this->_usedProperties['urls'])) {
            $output['urls'] = $this->urls;
        }

        return $output;
    }

}
