<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Elasticsearch'.\DIRECTORY_SEPARATOR.'SslConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Elasticsearch'.\DIRECTORY_SEPARATOR.'ProductConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Elasticsearch'.\DIRECTORY_SEPARATOR.'SearchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Elasticsearch'.\DIRECTORY_SEPARATOR.'AdministrationConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ElasticsearchConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $enabled;
    private $indexingEnabled;
    private $indexingBatchSize;
    private $hosts;
    private $indexPrefix;
    private $throwException;
    private $ssl;
    private $indexSettings;
    private $analysis;
    private $languageAnalyzerMapping;
    private $useLanguageAnalyzer;
    private $dynamicTemplates;
    private $product;
    private $search;
    private $administration;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function enabled($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['enabled'] = true;
        $this->enabled = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function indexingEnabled($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['indexingEnabled'] = true;
        $this->indexingEnabled = $value;

        return $this;
    }

    /**
     * @default 100
     * @param ParamConfigurator|int $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function indexingBatchSize($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['indexingBatchSize'] = true;
        $this->indexingBatchSize = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function hosts($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['hosts'] = true;
        $this->hosts = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function indexPrefix($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['indexPrefix'] = true;
        $this->indexPrefix = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function throwException($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['throwException'] = true;
        $this->throwException = $value;

        return $this;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function ssl(array $value = []): \Symfony\Config\Elasticsearch\SslConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->ssl) {
            $this->_usedProperties['ssl'] = true;
            $this->ssl = new \Symfony\Config\Elasticsearch\SslConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "ssl()" has already been initialized. You cannot pass values the second time you call ssl().');
        }

        return $this->ssl;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function indexSettings(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['indexSettings'] = true;
        $this->indexSettings = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function analysis(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['analysis'] = true;
        $this->analysis = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function languageAnalyzerMapping(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['languageAnalyzerMapping'] = true;
        $this->languageAnalyzerMapping = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function useLanguageAnalyzer($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['useLanguageAnalyzer'] = true;
        $this->useLanguageAnalyzer = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function dynamicTemplates(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['dynamicTemplates'] = true;
        $this->dynamicTemplates = $value;

        return $this;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function product(array $value = []): \Symfony\Config\Elasticsearch\ProductConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->product) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\Elasticsearch\ProductConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "product()" has already been initialized. You cannot pass values the second time you call product().');
        }

        return $this->product;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function search(array $value = []): \Symfony\Config\Elasticsearch\SearchConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->search) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Elasticsearch\SearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "search()" has already been initialized. You cannot pass values the second time you call search().');
        }

        return $this->search;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function administration(array $value = []): \Symfony\Config\Elasticsearch\AdministrationConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->administration) {
            $this->_usedProperties['administration'] = true;
            $this->administration = new \Symfony\Config\Elasticsearch\AdministrationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "administration()" has already been initialized. You cannot pass values the second time you call administration().');
        }

        return $this->administration;
    }

    public function getExtensionAlias(): string
    {
        return 'elasticsearch';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('enabled', $config)) {
            $this->_usedProperties['enabled'] = true;
            $this->enabled = $config['enabled'];
            unset($config['enabled']);
        }

        if (array_key_exists('indexing_enabled', $config)) {
            $this->_usedProperties['indexingEnabled'] = true;
            $this->indexingEnabled = $config['indexing_enabled'];
            unset($config['indexing_enabled']);
        }

        if (array_key_exists('indexing_batch_size', $config)) {
            $this->_usedProperties['indexingBatchSize'] = true;
            $this->indexingBatchSize = $config['indexing_batch_size'];
            unset($config['indexing_batch_size']);
        }

        if (array_key_exists('hosts', $config)) {
            $this->_usedProperties['hosts'] = true;
            $this->hosts = $config['hosts'];
            unset($config['hosts']);
        }

        if (array_key_exists('index_prefix', $config)) {
            $this->_usedProperties['indexPrefix'] = true;
            $this->indexPrefix = $config['index_prefix'];
            unset($config['index_prefix']);
        }

        if (array_key_exists('throw_exception', $config)) {
            $this->_usedProperties['throwException'] = true;
            $this->throwException = $config['throw_exception'];
            unset($config['throw_exception']);
        }

        if (array_key_exists('ssl', $config)) {
            $this->_usedProperties['ssl'] = true;
            $this->ssl = new \Symfony\Config\Elasticsearch\SslConfig($config['ssl']);
            unset($config['ssl']);
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

        if (array_key_exists('language_analyzer_mapping', $config)) {
            $this->_usedProperties['languageAnalyzerMapping'] = true;
            $this->languageAnalyzerMapping = $config['language_analyzer_mapping'];
            unset($config['language_analyzer_mapping']);
        }

        if (array_key_exists('use_language_analyzer', $config)) {
            $this->_usedProperties['useLanguageAnalyzer'] = true;
            $this->useLanguageAnalyzer = $config['use_language_analyzer'];
            unset($config['use_language_analyzer']);
        }

        if (array_key_exists('dynamic_templates', $config)) {
            $this->_usedProperties['dynamicTemplates'] = true;
            $this->dynamicTemplates = $config['dynamic_templates'];
            unset($config['dynamic_templates']);
        }

        if (array_key_exists('product', $config)) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\Elasticsearch\ProductConfig($config['product']);
            unset($config['product']);
        }

        if (array_key_exists('search', $config)) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Elasticsearch\SearchConfig($config['search']);
            unset($config['search']);
        }

        if (array_key_exists('administration', $config)) {
            $this->_usedProperties['administration'] = true;
            $this->administration = new \Symfony\Config\Elasticsearch\AdministrationConfig($config['administration']);
            unset($config['administration']);
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
        if (isset($this->_usedProperties['indexingEnabled'])) {
            $output['indexing_enabled'] = $this->indexingEnabled;
        }
        if (isset($this->_usedProperties['indexingBatchSize'])) {
            $output['indexing_batch_size'] = $this->indexingBatchSize;
        }
        if (isset($this->_usedProperties['hosts'])) {
            $output['hosts'] = $this->hosts;
        }
        if (isset($this->_usedProperties['indexPrefix'])) {
            $output['index_prefix'] = $this->indexPrefix;
        }
        if (isset($this->_usedProperties['throwException'])) {
            $output['throw_exception'] = $this->throwException;
        }
        if (isset($this->_usedProperties['ssl'])) {
            $output['ssl'] = $this->ssl->toArray();
        }
        if (isset($this->_usedProperties['indexSettings'])) {
            $output['index_settings'] = $this->indexSettings;
        }
        if (isset($this->_usedProperties['analysis'])) {
            $output['analysis'] = $this->analysis;
        }
        if (isset($this->_usedProperties['languageAnalyzerMapping'])) {
            $output['language_analyzer_mapping'] = $this->languageAnalyzerMapping;
        }
        if (isset($this->_usedProperties['useLanguageAnalyzer'])) {
            $output['use_language_analyzer'] = $this->useLanguageAnalyzer;
        }
        if (isset($this->_usedProperties['dynamicTemplates'])) {
            $output['dynamic_templates'] = $this->dynamicTemplates;
        }
        if (isset($this->_usedProperties['product'])) {
            $output['product'] = $this->product->toArray();
        }
        if (isset($this->_usedProperties['search'])) {
            $output['search'] = $this->search->toArray();
        }
        if (isset($this->_usedProperties['administration'])) {
            $output['administration'] = $this->administration->toArray();
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
