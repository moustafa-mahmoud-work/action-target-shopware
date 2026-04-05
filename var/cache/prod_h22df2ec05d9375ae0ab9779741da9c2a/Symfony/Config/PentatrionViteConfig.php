<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PentatrionVite'.\DIRECTORY_SEPARATOR.'BuildsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'PentatrionVite'.\DIRECTORY_SEPARATOR.'ConfigsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PentatrionViteConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $publicDirectory;
    private $buildDirectory;
    private $proxyOrigin;
    private $absoluteUrl;
    private $throwOnMissingEntry;
    private $throwOnMissingAsset;
    private $cache;
    private $preload;
    private $crossorigin;
    private $scriptAttributes;
    private $linkAttributes;
    private $preloadAttributes;
    private $defaultBuild;
    private $builds;
    private $defaultConfig;
    private $configs;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * @default 'public'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function publicDirectory($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['publicDirectory'] = true;
        $this->publicDirectory = $value;

        return $this;
    }

    /**
     * we only need build_directory to locate entrypoints.json file, it's the "base" vite config parameter without slashes.
     * @default 'build'
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function buildDirectory($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['buildDirectory'] = true;
        $this->buildDirectory = $value;

        return $this;
    }

    /**
     * Allows to use different origin for asset proxy, eg. http://host.docker.internal:5173
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function proxyOrigin($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['proxyOrigin'] = true;
        $this->proxyOrigin = $value;

        return $this;
    }

    /**
     * Prepend the rendered link and script tags with an absolute URL.
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function absoluteUrl($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['absoluteUrl'] = true;
        $this->absoluteUrl = $value;

        return $this;
    }

    /**
     * Throw exception when entry is not present in the entrypoints file
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function throwOnMissingEntry($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['throwOnMissingEntry'] = true;
        $this->throwOnMissingEntry = $value;

        return $this;
    }

    /**
     * Throw exception when asset is not present in the manifest file
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function throwOnMissingAsset($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['throwOnMissingAsset'] = true;
        $this->throwOnMissingAsset = $value;

        return $this;
    }

    /**
     * Enable caching of the entry point file(s)
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function cache($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

        return $this;
    }

    /**
     * preload all rendered script and link tags automatically via the http2 Link header. (symfony/web-link is required) Instead <link rel="modulepreload"> will be used.
     * @default 'link-tag'
     * @param ParamConfigurator|'none'|'link-tag'|'link-header' $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function preload($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['preload'] = true;
        $this->preload = $value;

        return $this;
    }

    /**
     * crossorigin value, can be false, true (default), anonymous (same as true) or use-credentials
     * @default true
     * @param ParamConfigurator|false|true|'anonymous'|'use-credentials' $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function crossorigin($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['crossorigin'] = true;
        $this->crossorigin = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function scriptAttributes(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['scriptAttributes'] = true;
        $this->scriptAttributes = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function linkAttributes(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['linkAttributes'] = true;
        $this->linkAttributes = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function preloadAttributes(ParamConfigurator|array $value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['preloadAttributes'] = true;
        $this->preloadAttributes = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @deprecated Since pentatrion/vite-bundle 6.0.0: The "default_build" option is deprecated. Use "default_config" instead.
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function defaultBuild($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['defaultBuild'] = true;
        $this->defaultBuild = $value;

        return $this;
    }

    /**
     * @deprecated Since pentatrion/vite-bundle 6.0.0: The "builds" option is deprecated. Use "configs" instead.
     * @deprecated since Symfony 7.4
     */
    public function builds(string $name, array $value = []): \Symfony\Config\PentatrionVite\BuildsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->builds[$name])) {
            $this->_usedProperties['builds'] = true;
            $this->builds[$name] = new \Symfony\Config\PentatrionVite\BuildsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "builds()" has already been initialized. You cannot pass values the second time you call builds().');
        }

        return $this->builds[$name];
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     * @deprecated since Symfony 7.4
     */
    public function defaultConfig($value): static
    {
        $this->_hasDeprecatedCalls = true;
        $this->_usedProperties['defaultConfig'] = true;
        $this->defaultConfig = $value;

        return $this;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function configs(string $name, array $value = []): \Symfony\Config\PentatrionVite\ConfigsConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->configs[$name])) {
            $this->_usedProperties['configs'] = true;
            $this->configs[$name] = new \Symfony\Config\PentatrionVite\ConfigsConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "configs()" has already been initialized. You cannot pass values the second time you call configs().');
        }

        return $this->configs[$name];
    }

    public function getExtensionAlias(): string
    {
        return 'pentatrion_vite';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('public_directory', $config)) {
            $this->_usedProperties['publicDirectory'] = true;
            $this->publicDirectory = $config['public_directory'];
            unset($config['public_directory']);
        }

        if (array_key_exists('build_directory', $config)) {
            $this->_usedProperties['buildDirectory'] = true;
            $this->buildDirectory = $config['build_directory'];
            unset($config['build_directory']);
        }

        if (array_key_exists('proxy_origin', $config)) {
            $this->_usedProperties['proxyOrigin'] = true;
            $this->proxyOrigin = $config['proxy_origin'];
            unset($config['proxy_origin']);
        }

        if (array_key_exists('absolute_url', $config)) {
            $this->_usedProperties['absoluteUrl'] = true;
            $this->absoluteUrl = $config['absolute_url'];
            unset($config['absolute_url']);
        }

        if (array_key_exists('throw_on_missing_entry', $config)) {
            $this->_usedProperties['throwOnMissingEntry'] = true;
            $this->throwOnMissingEntry = $config['throw_on_missing_entry'];
            unset($config['throw_on_missing_entry']);
        }

        if (array_key_exists('throw_on_missing_asset', $config)) {
            $this->_usedProperties['throwOnMissingAsset'] = true;
            $this->throwOnMissingAsset = $config['throw_on_missing_asset'];
            unset($config['throw_on_missing_asset']);
        }

        if (array_key_exists('cache', $config)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $config['cache'];
            unset($config['cache']);
        }

        if (array_key_exists('preload', $config)) {
            $this->_usedProperties['preload'] = true;
            $this->preload = $config['preload'];
            unset($config['preload']);
        }

        if (array_key_exists('crossorigin', $config)) {
            $this->_usedProperties['crossorigin'] = true;
            $this->crossorigin = $config['crossorigin'];
            unset($config['crossorigin']);
        }

        if (array_key_exists('script_attributes', $config)) {
            $this->_usedProperties['scriptAttributes'] = true;
            $this->scriptAttributes = $config['script_attributes'];
            unset($config['script_attributes']);
        }

        if (array_key_exists('link_attributes', $config)) {
            $this->_usedProperties['linkAttributes'] = true;
            $this->linkAttributes = $config['link_attributes'];
            unset($config['link_attributes']);
        }

        if (array_key_exists('preload_attributes', $config)) {
            $this->_usedProperties['preloadAttributes'] = true;
            $this->preloadAttributes = $config['preload_attributes'];
            unset($config['preload_attributes']);
        }

        if (array_key_exists('default_build', $config)) {
            $this->_usedProperties['defaultBuild'] = true;
            $this->defaultBuild = $config['default_build'];
            unset($config['default_build']);
        }

        if (array_key_exists('builds', $config)) {
            $this->_usedProperties['builds'] = true;
            $this->builds = array_map(fn ($v) => new \Symfony\Config\PentatrionVite\BuildsConfig($v), $config['builds']);
            unset($config['builds']);
        }

        if (array_key_exists('default_config', $config)) {
            $this->_usedProperties['defaultConfig'] = true;
            $this->defaultConfig = $config['default_config'];
            unset($config['default_config']);
        }

        if (array_key_exists('configs', $config)) {
            $this->_usedProperties['configs'] = true;
            $this->configs = array_map(fn ($v) => new \Symfony\Config\PentatrionVite\ConfigsConfig($v), $config['configs']);
            unset($config['configs']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['publicDirectory'])) {
            $output['public_directory'] = $this->publicDirectory;
        }
        if (isset($this->_usedProperties['buildDirectory'])) {
            $output['build_directory'] = $this->buildDirectory;
        }
        if (isset($this->_usedProperties['proxyOrigin'])) {
            $output['proxy_origin'] = $this->proxyOrigin;
        }
        if (isset($this->_usedProperties['absoluteUrl'])) {
            $output['absolute_url'] = $this->absoluteUrl;
        }
        if (isset($this->_usedProperties['throwOnMissingEntry'])) {
            $output['throw_on_missing_entry'] = $this->throwOnMissingEntry;
        }
        if (isset($this->_usedProperties['throwOnMissingAsset'])) {
            $output['throw_on_missing_asset'] = $this->throwOnMissingAsset;
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['preload'])) {
            $output['preload'] = $this->preload;
        }
        if (isset($this->_usedProperties['crossorigin'])) {
            $output['crossorigin'] = $this->crossorigin;
        }
        if (isset($this->_usedProperties['scriptAttributes'])) {
            $output['script_attributes'] = $this->scriptAttributes;
        }
        if (isset($this->_usedProperties['linkAttributes'])) {
            $output['link_attributes'] = $this->linkAttributes;
        }
        if (isset($this->_usedProperties['preloadAttributes'])) {
            $output['preload_attributes'] = $this->preloadAttributes;
        }
        if (isset($this->_usedProperties['defaultBuild'])) {
            $output['default_build'] = $this->defaultBuild;
        }
        if (isset($this->_usedProperties['builds'])) {
            $output['builds'] = array_map(fn ($v) => $v->toArray(), $this->builds);
        }
        if (isset($this->_usedProperties['defaultConfig'])) {
            $output['default_config'] = $this->defaultConfig;
        }
        if (isset($this->_usedProperties['configs'])) {
            $output['configs'] = array_map(fn ($v) => $v->toArray(), $this->configs);
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
