<?php

namespace Symfony\Config\Shopware\HtmlSanitizer\SetsConfig;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CustomAttributesConfig 
{
    private $tags;
    private $attributes;
    private $_usedProperties = [];

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

    public function __construct(array $config = [])
    {
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

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['tags'])) {
            $output['tags'] = $this->tags;
        }
        if (isset($this->_usedProperties['attributes'])) {
            $output['attributes'] = $this->attributes;
        }

        return $output;
    }

}
