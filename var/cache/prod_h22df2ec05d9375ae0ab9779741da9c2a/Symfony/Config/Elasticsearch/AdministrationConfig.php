<?php

namespace Symfony\Config\Elasticsearch;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Administration'.\DIRECTORY_SEPARATOR.'SearchConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AdministrationConfig 
{
    private $hosts;
    private $enabled;
    private $refreshIndices;
    private $indexPrefix;
    private $indexSettings;
    private $analysis;
    private $dynamicTemplates;
    private $search;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function hosts($value): static
    {
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @default null
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
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function refreshIndices($value): static
    {
        $this->_usedProperties['refreshIndices'] = true;
        $this->refreshIndices = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function indexPrefix($value): static
    {
        $this->_usedProperties['indexPrefix'] = true;
        $this->indexPrefix = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function indexSettings(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['indexSettings'] = true;
        $this->indexSettings = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function analysis(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['analysis'] = true;
        $this->analysis = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function dynamicTemplates(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['dynamicTemplates'] = true;
        $this->dynamicTemplates = $value;

        return $this;
    }

    public function search(array $value = []): \Symfony\Config\Elasticsearch\Administration\SearchConfig
    {
        if (null === $this->search) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Elasticsearch\Administration\SearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "search()" has already been initialized. You cannot pass values the second time you call search().');
        }

        return $this->search;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('hosts', $config)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $config['hosts'];
            unset($config['hosts']);
        }

        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('refresh_indices', $config)) {
            $this->_usedProperties['refreshIndices'] = true;
            $this->refreshIndices = $config['refresh_indices'];
            unset($config['refresh_indices']);
        }

        if (array_key_exists('index_prefix', $config)) {
            $this->_usedProperties['indexPrefix'] = true;
            $this->indexPrefix = $config['index_prefix'];
            unset($config['index_prefix']);
        }

        if (array_key_exists('index_settings', $config)) {
            $this->_usedProperties['indexSettings'] = true;
            $this->indexSettings = $config['index_settings'];
            unset($config['index_settings']);
        }

        if (array_key_exists('analysis', $config)) {
            $this->_usedProperties['analysis'] = true;
            $this->analysis = $config['analysis'];
            unset($config['analysis']);
        }

        if (array_key_exists('dynamic_templates', $config)) {
            $this->_usedProperties['dynamicTemplates'] = true;
            $this->dynamicTemplates = $config['dynamic_templates'];
            unset($config['dynamic_templates']);
        }

        if (array_key_exists('search', $config)) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Elasticsearch\Administration\SearchConfig($config['search']);
            unset($config['search']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['enabled'])) {
            $output['enabled'] = $this->enabled;
        }
        if (isset($this->_usedProperties['refreshIndices'])) {
            $output['refresh_indices'] = $this->refreshIndices;
        }
        if (isset($this->_usedProperties['indexPrefix'])) {
            $output['index_prefix'] = $this->indexPrefix;
        }
        if (isset($this->_usedProperties['indexSettings'])) {
            $output['index_settings'] = $this->indexSettings;
        }
        if (isset($this->_usedProperties['analysis'])) {
            $output['analysis'] = $this->analysis;
        }
        if (isset($this->_usedProperties['dynamicTemplates'])) {
            $output['dynamic_templates'] = $this->dynamicTemplates;
        }
        if (isset($this->_usedProperties['search'])) {
            $output['search'] = $this->search->toArray();
        }

        return $output;
    }

}
