<?php

namespace Symfony\Config\Shopware\Feature;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class FlagsConfig 
{
    private $name;
    private $default;
    private $major;
    private $toggleable;
    private $description;
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
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function default($value): static
    {
        $this->_usedProperties['default'] = true;
        $this->default = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function major($value): static
    {
        $this->_usedProperties['major'] = true;
        $this->major = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function toggleable($value): static
    {
        $this->_usedProperties['toggleable'] = true;
        $this->toggleable = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function description($value): static
    {
        $this->_usedProperties['description'] = true;
        $this->description = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('name', $config)) {
            $this->_usedProperties['name'] = true;
            $this->name = $config['name'];
            unset($config['name']);
        }

        if (array_key_exists('default', $config)) {
            $this->_usedProperties['default'] = true;
            $this->default = $config['default'];
            unset($config['default']);
        }

        if (array_key_exists('major', $config)) {
            $this->_usedProperties['major'] = true;
            $this->major = $config['major'];
            unset($config['major']);
        }

        if (array_key_exists('toggleable', $config)) {
            $this->_usedProperties['toggleable'] = true;
            $this->toggleable = $config['toggleable'];
            unset($config['toggleable']);
        }

        if (array_key_exists('description', $config)) {
            $this->_usedProperties['description'] = true;
            $this->description = $config['description'];
            unset($config['description']);
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
        if (isset($this->_usedProperties['default'])) {
            $output['default'] = $this->default;
        }
        if (isset($this->_usedProperties['major'])) {
            $output['major'] = $this->major;
        }
        if (isset($this->_usedProperties['toggleable'])) {
            $output['toggleable'] = $this->toggleable;
        }
        if (isset($this->_usedProperties['description'])) {
            $output['description'] = $this->description;
        }

        return $output;
    }

}
