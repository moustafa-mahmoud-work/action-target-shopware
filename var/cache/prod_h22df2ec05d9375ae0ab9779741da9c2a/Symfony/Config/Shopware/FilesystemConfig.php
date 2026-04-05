<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'PrivateConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'PublicConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'TempConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'ThemeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'AssetConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Filesystem'.\DIRECTORY_SEPARATOR.'SitemapConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class FilesystemConfig 
{
    private $private;
    private $public;
    private $temp;
    private $theme;
    private $asset;
    private $sitemap;
    private $allowedExtensions;
    private $privateAllowedExtensions;
    private $privateLocalDownloadStrategy;
    private $privateLocalPathPrefix;
    private $batchWriteSize;
    private $_usedProperties = [];

    public function private(array $value = []): \Symfony\Config\Shopware\Filesystem\PrivateConfig
    {
        if (null === $this->private) {
            $this->_usedProperties['private'] = true;
            $this->private = new \Symfony\Config\Shopware\Filesystem\PrivateConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "private()" has already been initialized. You cannot pass values the second time you call private().');
        }

        return $this->private;
    }

    public function public(array $value = []): \Symfony\Config\Shopware\Filesystem\PublicConfig
    {
        if (null === $this->public) {
            $this->_usedProperties['public'] = true;
            $this->public = new \Symfony\Config\Shopware\Filesystem\PublicConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "public()" has already been initialized. You cannot pass values the second time you call public().');
        }

        return $this->public;
    }

    public function temp(array $value = []): \Symfony\Config\Shopware\Filesystem\TempConfig
    {
        if (null === $this->temp) {
            $this->_usedProperties['temp'] = true;
            $this->temp = new \Symfony\Config\Shopware\Filesystem\TempConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "temp()" has already been initialized. You cannot pass values the second time you call temp().');
        }

        return $this->temp;
    }

    public function theme(array $value = []): \Symfony\Config\Shopware\Filesystem\ThemeConfig
    {
        if (null === $this->theme) {
            $this->_usedProperties['theme'] = true;
            $this->theme = new \Symfony\Config\Shopware\Filesystem\ThemeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "theme()" has already been initialized. You cannot pass values the second time you call theme().');
        }

        return $this->theme;
    }

    public function asset(array $value = []): \Symfony\Config\Shopware\Filesystem\AssetConfig
    {
        if (null === $this->asset) {
            $this->_usedProperties['asset'] = true;
            $this->asset = new \Symfony\Config\Shopware\Filesystem\AssetConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "asset()" has already been initialized. You cannot pass values the second time you call asset().');
        }

        return $this->asset;
    }

    public function sitemap(array $value = []): \Symfony\Config\Shopware\Filesystem\SitemapConfig
    {
        if (null === $this->sitemap) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\Shopware\Filesystem\SitemapConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sitemap()" has already been initialized. You cannot pass values the second time you call sitemap().');
        }

        return $this->sitemap;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowedExtensions(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowedExtensions'] = true;
        $this->allowedExtensions = $value;

        return $this;
    }

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function privateAllowedExtensions(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['privateAllowedExtensions'] = true;
        $this->privateAllowedExtensions = $value;

        return $this;
    }

    /**
     * @default 'php'
     * @param ParamConfigurator|'php'|'x-sendfile'|'x-accel' $value
     * @return $this
     */
    public function privateLocalDownloadStrategy($value): static
    {
        $this->_usedProperties['privateLocalDownloadStrategy'] = true;
        $this->privateLocalDownloadStrategy = $value;

        return $this;
    }

    /**
     * Path prefix to be prepended to the path when using a local download strategy
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function privateLocalPathPrefix($value): static
    {
        $this->_usedProperties['privateLocalPathPrefix'] = true;
        $this->privateLocalPathPrefix = $value;

        return $this;
    }

    /**
     * Batch size for writing files simultaneously using AsyncAwsS3WriteBatchAdapter
     * @default 250
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function batchWriteSize($value): static
    {
        $this->_usedProperties['batchWriteSize'] = true;
        $this->batchWriteSize = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('private', $config)) {
            $this->_usedProperties['private'] = true;
            $this->private = new \Symfony\Config\Shopware\Filesystem\PrivateConfig($config['private']);
            unset($config['private']);
        }

        if (array_key_exists('public', $config)) {
            $this->_usedProperties['public'] = true;
            $this->public = new \Symfony\Config\Shopware\Filesystem\PublicConfig($config['public']);
            unset($config['public']);
        }

        if (array_key_exists('temp', $config)) {
            $this->_usedProperties['temp'] = true;
            $this->temp = new \Symfony\Config\Shopware\Filesystem\TempConfig($config['temp']);
            unset($config['temp']);
        }

        if (array_key_exists('theme', $config)) {
            $this->_usedProperties['theme'] = true;
            $this->theme = new \Symfony\Config\Shopware\Filesystem\ThemeConfig($config['theme']);
            unset($config['theme']);
        }

        if (array_key_exists('asset', $config)) {
            $this->_usedProperties['asset'] = true;
            $this->asset = new \Symfony\Config\Shopware\Filesystem\AssetConfig($config['asset']);
            unset($config['asset']);
        }

        if (array_key_exists('sitemap', $config)) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\Shopware\Filesystem\SitemapConfig($config['sitemap']);
            unset($config['sitemap']);
        }

        if (array_key_exists('allowed_extensions', $config)) {
            $this->_usedProperties['allowedExtensions'] = true;
            $this->allowedExtensions = $config['allowed_extensions'];
            unset($config['allowed_extensions']);
        }

        if (array_key_exists('private_allowed_extensions', $config)) {
            $this->_usedProperties['privateAllowedExtensions'] = true;
            $this->privateAllowedExtensions = $config['private_allowed_extensions'];
            unset($config['private_allowed_extensions']);
        }

        if (array_key_exists('private_local_download_strategy', $config)) {
            $this->_usedProperties['privateLocalDownloadStrategy'] = true;
            $this->privateLocalDownloadStrategy = $config['private_local_download_strategy'];
            unset($config['private_local_download_strategy']);
        }

        if (array_key_exists('private_local_path_prefix', $config)) {
            $this->_usedProperties['privateLocalPathPrefix'] = true;
            $this->privateLocalPathPrefix = $config['private_local_path_prefix'];
            unset($config['private_local_path_prefix']);
        }

        if (array_key_exists('batch_write_size', $config)) {
            $this->_usedProperties['batchWriteSize'] = true;
            $this->batchWriteSize = $config['batch_write_size'];
            unset($config['batch_write_size']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['private'])) {
            $output['private'] = $this->private->toArray();
        }
        if (isset($this->_usedProperties['public'])) {
            $output['public'] = $this->public->toArray();
        }
        if (isset($this->_usedProperties['temp'])) {
            $output['temp'] = $this->temp->toArray();
        }
        if (isset($this->_usedProperties['theme'])) {
            $output['theme'] = $this->theme->toArray();
        }
        if (isset($this->_usedProperties['asset'])) {
            $output['asset'] = $this->asset->toArray();
        }
        if (isset($this->_usedProperties['sitemap'])) {
            $output['sitemap'] = $this->sitemap->toArray();
        }
        if (isset($this->_usedProperties['allowedExtensions'])) {
            $output['allowed_extensions'] = $this->allowedExtensions;
        }
        if (isset($this->_usedProperties['privateAllowedExtensions'])) {
            $output['private_allowed_extensions'] = $this->privateAllowedExtensions;
        }
        if (isset($this->_usedProperties['privateLocalDownloadStrategy'])) {
            $output['private_local_download_strategy'] = $this->privateLocalDownloadStrategy;
        }
        if (isset($this->_usedProperties['privateLocalPathPrefix'])) {
            $output['private_local_path_prefix'] = $this->privateLocalPathPrefix;
        }
        if (isset($this->_usedProperties['batchWriteSize'])) {
            $output['batch_write_size'] = $this->batchWriteSize;
        }

        return $output;
    }

}
