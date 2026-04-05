<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'HtmlSanitizer'.\DIRECTORY_SEPARATOR.'SetsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'HtmlSanitizer'.\DIRECTORY_SEPARATOR.'FieldsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class HtmlSanitizerConfig 
{
    private $enabled;
    private $cacheDir;
    private $cacheEnabled;
    private $sets;
    private $fields;
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
     * @default '%kernel.cache_dir%'
     * @param ParamConfigurator|mixed $value
     *
     * @return $this
     */
    public function cacheDir(mixed $value = '%kernel.cache_dir%'): static
    {
        $this->_usedProperties['cacheDir'] = true;
        $this->cacheDir = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function cacheEnabled($value): static
    {
        $this->_usedProperties['cacheEnabled'] = true;
        $this->cacheEnabled = $value;

        return $this;
    }

    public function sets(string $name, array $value = []): \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig
    {
        if (!isset($this->sets[$name])) {
            $this->_usedProperties['sets'] = true;
            $this->sets[$name] = new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sets()" has already been initialized. You cannot pass values the second time you call sets().');
        }

        return $this->sets[$name];
    }

    public function fields(string $name, array $value = []): \Symfony\Config\Shopware\HtmlSanitizer\FieldsConfig
    {
        if (!isset($this->fields[$name])) {
            $this->_usedProperties['fields'] = true;
            $this->fields[$name] = new \Symfony\Config\Shopware\HtmlSanitizer\FieldsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fields()" has already been initialized. You cannot pass values the second time you call fields().');
        }

        return $this->fields[$name];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('cache_dir', $config)) {
            $this->_usedProperties['cacheDir'] = true;
            $this->cacheDir = $config['cache_dir'];
            unset($config['cache_dir']);
        }

        if (array_key_exists('cache_enabled', $config)) {
            $this->_usedProperties['cacheEnabled'] = true;
            $this->cacheEnabled = $config['cache_enabled'];
            unset($config['cache_enabled']);
        }

        if (array_key_exists('sets', $config)) {
            $this->_usedProperties['sets'] = true;
            $this->sets = array_map(fn ($v) => new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig($v), $config['sets']);
            unset($config['sets']);
        }

        if (array_key_exists('fields', $config)) {
            $this->_usedProperties['fields'] = true;
            $this->fields = array_map(fn ($v) => new \Symfony\Config\Shopware\HtmlSanitizer\FieldsConfig($v), $config['fields']);
            unset($config['fields']);
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
        if (isset($this->_usedProperties['cacheDir'])) {
            $output['cache_dir'] = $this->cacheDir;
        }
        if (isset($this->_usedProperties['cacheEnabled'])) {
            $output['cache_enabled'] = $this->cacheEnabled;
        }
        if (isset($this->_usedProperties['sets'])) {
            $output['sets'] = array_map(fn ($v) => $v->toArray(), $this->sets);
        }
        if (isset($this->_usedProperties['fields'])) {
            $output['fields'] = array_map(fn ($v) => $v->toArray(), $this->fields);
        }

        return $output;
    }

}
