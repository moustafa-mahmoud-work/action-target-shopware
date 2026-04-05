<?php

namespace Symfony\Config\Shopware\HtmlSanitizer;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SetsConfig'.\DIRECTORY_SEPARATOR.'CustomAttributesConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'SetsConfig'.\DIRECTORY_SEPARATOR.'OptionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SetsConfig 
{
    private $name;
    private $tags;
    private $attributes;
    private $customAttributes;
    private $options;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function name($value): static
    {
        $this->_usedProperties['name'] = true;
        $this->name = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function tags(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['tags'] = true;
        $this->tags = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function attributes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['attributes'] = true;
        $this->attributes = $value;

        return $this;
    }

    public function customAttributes(array $value = []): \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\CustomAttributesConfig
    {
        $this->_usedProperties['customAttributes'] = true;

        return $this->customAttributes[] = new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\CustomAttributesConfig($value);
    }

    public function options(string $key, array $value = []): \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\OptionsConfig
    {
        if (!isset($this->options[$key])) {
            $this->_usedProperties['options'] = true;
            $this->options[$key] = new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\OptionsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "options()" has already been initialized. You cannot pass values the second time you call options().');
        }

        return $this->options[$key];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('name', $config)) {
            $this->_usedProperties['name'] = true;
            $this->name = $config['name'];
            unset($config['name']);
        }

        if (array_key_exists('tags', $config)) {
            $this->_usedProperties['tags'] = true;
            $this->tags = $config['tags'];
            unset($config['tags']);
        }

        if (array_key_exists('attributes', $config)) {
            $this->_usedProperties['attributes'] = true;
            $this->attributes = $config['attributes'];
            unset($config['attributes']);
        }

        if (array_key_exists('custom_attributes', $config)) {
            $this->_usedProperties['customAttributes'] = true;
            $this->customAttributes = array_map(fn ($v) => new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\CustomAttributesConfig($v), $config['custom_attributes']);
            unset($config['custom_attributes']);
        }

        if (array_key_exists('options', $config)) {
            $this->_usedProperties['options'] = true;
            $this->options = array_map(fn ($v) => new \Symfony\Config\Shopware\HtmlSanitizer\SetsConfig\OptionsConfig($v), $config['options']);
            unset($config['options']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['name'])) {
            $output['name'] = $this->name;
        }
        if (isset($this->_usedProperties['tags'])) {
            $output['tags'] = $this->tags;
        }
        if (isset($this->_usedProperties['attributes'])) {
            $output['attributes'] = $this->attributes;
        }
        if (isset($this->_usedProperties['customAttributes'])) {
            $output['custom_attributes'] = array_map(fn ($v) => $v->toArray(), $this->customAttributes);
        }
        if (isset($this->_usedProperties['options'])) {
            $output['options'] = array_map(fn ($v) => $v->toArray(), $this->options);
        }

        return $output;
    }

}
