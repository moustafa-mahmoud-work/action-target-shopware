<?php

namespace Symfony\Config\Shopware\Telemetry;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Metrics'.\DIRECTORY_SEPARATOR.'DefinitionsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MetricsConfig 
{
    private $namespace;
    private $allowUnknownLabels;
    private $allowUnknownLabelValues;
    private $enableInternalMetrics;
    private $enabled;
    private $replaceUnknownLabelValuesWith;
    private $definitions;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function namespace($value): static
    {
        $this->_usedProperties['namespace'] = true;
        $this->namespace = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowUnknownLabels($value): static
    {
        $this->_usedProperties['allowUnknownLabels'] = true;
        $this->allowUnknownLabels = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function allowUnknownLabelValues($value): static
    {
        $this->_usedProperties['allowUnknownLabelValues'] = true;
        $this->allowUnknownLabelValues = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableInternalMetrics($value): static
    {
        $this->_usedProperties['enableInternalMetrics'] = true;
        $this->enableInternalMetrics = $value;

        return $this;
    }

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
     * @default 'other'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function replaceUnknownLabelValuesWith($value): static
    {
        $this->_usedProperties['replaceUnknownLabelValuesWith'] = true;
        $this->replaceUnknownLabelValuesWith = $value;

        return $this;
    }

    public function definitions(string $name, array $value = []): \Symfony\Config\Shopware\Telemetry\Metrics\DefinitionsConfig
    {
        if (!isset($this->definitions[$name])) {
            $this->_usedProperties['definitions'] = true;
            $this->definitions[$name] = new \Symfony\Config\Shopware\Telemetry\Metrics\DefinitionsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "definitions()" has already been initialized. You cannot pass values the second time you call definitions().');
        }

        return $this->definitions[$name];
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('namespace', $config)) {
            $this->_usedProperties['namespace'] = true;
            $this->namespace = $config['namespace'];
            unset($config['namespace']);
        }

        if (array_key_exists('allow_unknown_labels', $config)) {
            $this->_usedProperties['allowUnknownLabels'] = true;
            $this->allowUnknownLabels = $config['allow_unknown_labels'];
            unset($config['allow_unknown_labels']);
        }

        if (array_key_exists('allow_unknown_label_values', $config)) {
            $this->_usedProperties['allowUnknownLabelValues'] = true;
            $this->allowUnknownLabelValues = $config['allow_unknown_label_values'];
            unset($config['allow_unknown_label_values']);
        }

        if (array_key_exists('enable_internal_metrics', $config)) {
            $this->_usedProperties['enableInternalMetrics'] = true;
            $this->enableInternalMetrics = $config['enable_internal_metrics'];
            unset($config['enable_internal_metrics']);
        }

        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('replace_unknown_label_values_with', $config)) {
            $this->_usedProperties['replaceUnknownLabelValuesWith'] = true;
            $this->replaceUnknownLabelValuesWith = $config['replace_unknown_label_values_with'];
            unset($config['replace_unknown_label_values_with']);
        }

        if (array_key_exists('definitions', $config)) {
            $this->_usedProperties['definitions'] = true;
            $this->definitions = array_map(fn ($v) => new \Symfony\Config\Shopware\Telemetry\Metrics\DefinitionsConfig($v), $config['definitions']);
            unset($config['definitions']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['namespace'])) {
            $output['namespace'] = $this->namespace;
        }
        if (isset($this->_usedProperties['allowUnknownLabels'])) {
            $output['allow_unknown_labels'] = $this->allowUnknownLabels;
        }
        if (isset($this->_usedProperties['allowUnknownLabelValues'])) {
            $output['allow_unknown_label_values'] = $this->allowUnknownLabelValues;
        }
        if (isset($this->_usedProperties['enableInternalMetrics'])) {
            $output['enable_internal_metrics'] = $this->enableInternalMetrics;
        }
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['replaceUnknownLabelValuesWith'])) {
            $output['replace_unknown_label_values_with'] = $this->replaceUnknownLabelValuesWith;
        }
        if (isset($this->_usedProperties['definitions'])) {
            $output['definitions'] = array_map(fn ($v) => $v->toArray(), $this->definitions);
        }

        return $output;
    }

}
