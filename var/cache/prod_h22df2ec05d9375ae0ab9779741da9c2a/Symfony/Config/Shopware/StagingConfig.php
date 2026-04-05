<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'MailingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'StorefrontConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'AdministrationConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'ExtensionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'SalesChannelConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Staging'.\DIRECTORY_SEPARATOR.'ElasticsearchConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StagingConfig 
{
    private $mailing;
    private $storefront;
    private $administration;
    private $extensions;
    private $salesChannel;
    private $elasticsearch;
    private $_usedProperties = [];

    public function mailing(array $value = []): \Symfony\Config\Shopware\Staging\MailingConfig
    {
        if (null === $this->mailing) {
            $this->_usedProperties['mailing'] = true;
            $this->mailing = new \Symfony\Config\Shopware\Staging\MailingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mailing()" has already been initialized. You cannot pass values the second time you call mailing().');
        }

        return $this->mailing;
    }

    public function storefront(array $value = []): \Symfony\Config\Shopware\Staging\StorefrontConfig
    {
        if (null === $this->storefront) {
            $this->_usedProperties['storefront'] = true;
            $this->storefront = new \Symfony\Config\Shopware\Staging\StorefrontConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "storefront()" has already been initialized. You cannot pass values the second time you call storefront().');
        }

        return $this->storefront;
    }

    public function administration(array $value = []): \Symfony\Config\Shopware\Staging\AdministrationConfig
    {
        if (null === $this->administration) {
            $this->_usedProperties['administration'] = true;
            $this->administration = new \Symfony\Config\Shopware\Staging\AdministrationConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "administration()" has already been initialized. You cannot pass values the second time you call administration().');
        }

        return $this->administration;
    }

    public function extensions(array $value = []): \Symfony\Config\Shopware\Staging\ExtensionsConfig
    {
        if (null === $this->extensions) {
            $this->_usedProperties['extensions'] = true;
            $this->extensions = new \Symfony\Config\Shopware\Staging\ExtensionsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "extensions()" has already been initialized. You cannot pass values the second time you call extensions().');
        }

        return $this->extensions;
    }

    public function salesChannel(array $value = []): \Symfony\Config\Shopware\Staging\SalesChannelConfig
    {
        if (null === $this->salesChannel) {
            $this->_usedProperties['salesChannel'] = true;
            $this->salesChannel = new \Symfony\Config\Shopware\Staging\SalesChannelConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "salesChannel()" has already been initialized. You cannot pass values the second time you call salesChannel().');
        }

        return $this->salesChannel;
    }

    public function elasticsearch(array $value = []): \Symfony\Config\Shopware\Staging\ElasticsearchConfig
    {
        if (null === $this->elasticsearch) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = new \Symfony\Config\Shopware\Staging\ElasticsearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "elasticsearch()" has already been initialized. You cannot pass values the second time you call elasticsearch().');
        }

        return $this->elasticsearch;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('mailing', $config)) {
            $this->_usedProperties['mailing'] = true;
            $this->mailing = new \Symfony\Config\Shopware\Staging\MailingConfig($config['mailing']);
            unset($config['mailing']);
        }

        if (array_key_exists('storefront', $config)) {
            $this->_usedProperties['storefront'] = true;
            $this->storefront = new \Symfony\Config\Shopware\Staging\StorefrontConfig($config['storefront']);
            unset($config['storefront']);
        }

        if (array_key_exists('administration', $config)) {
            $this->_usedProperties['administration'] = true;
            $this->administration = new \Symfony\Config\Shopware\Staging\AdministrationConfig($config['administration']);
            unset($config['administration']);
        }

        if (array_key_exists('extensions', $config)) {
            $this->_usedProperties['extensions'] = true;
            $this->extensions = new \Symfony\Config\Shopware\Staging\ExtensionsConfig($config['extensions']);
            unset($config['extensions']);
        }

        if (array_key_exists('sales_channel', $config)) {
            $this->_usedProperties['salesChannel'] = true;
            $this->salesChannel = new \Symfony\Config\Shopware\Staging\SalesChannelConfig($config['sales_channel']);
            unset($config['sales_channel']);
        }

        if (array_key_exists('elasticsearch', $config)) {
            $this->_usedProperties['elasticsearch'] = true;
            $this->elasticsearch = new \Symfony\Config\Shopware\Staging\ElasticsearchConfig($config['elasticsearch']);
            unset($config['elasticsearch']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['mailing'])) {
            $output['mailing'] = $this->mailing->toArray();
        }
        if (isset($this->_usedProperties['storefront'])) {
            $output['storefront'] = $this->storefront->toArray();
        }
        if (isset($this->_usedProperties['administration'])) {
            $output['administration'] = $this->administration->toArray();
        }
        if (isset($this->_usedProperties['extensions'])) {
            $output['extensions'] = $this->extensions->toArray();
        }
        if (isset($this->_usedProperties['salesChannel'])) {
            $output['sales_channel'] = $this->salesChannel->toArray();
        }
        if (isset($this->_usedProperties['elasticsearch'])) {
            $output['elasticsearch'] = $this->elasticsearch->toArray();
        }

        return $output;
    }

}
