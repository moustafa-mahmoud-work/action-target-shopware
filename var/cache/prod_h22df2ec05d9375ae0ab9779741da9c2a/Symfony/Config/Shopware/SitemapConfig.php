<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Sitemap'.\DIRECTORY_SEPARATOR.'CustomUrlsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sitemap'.\DIRECTORY_SEPARATOR.'ExcludedUrlsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Sitemap'.\DIRECTORY_SEPARATOR.'ScheduledTaskConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SitemapConfig 
{
    private $customUrls;
    private $excludedUrls;
    private $batchsize;
    private $scheduledTask;
    private $_usedProperties = [];

    public function customUrls(array $value = []): \Symfony\Config\Shopware\Sitemap\CustomUrlsConfig
    {
        $this->_usedProperties['customUrls'] = true;

        return $this->customUrls[] = new \Symfony\Config\Shopware\Sitemap\CustomUrlsConfig($value);
    }

    public function excludedUrls(array $value = []): \Symfony\Config\Shopware\Sitemap\ExcludedUrlsConfig
    {
        $this->_usedProperties['excludedUrls'] = true;

        return $this->excludedUrls[] = new \Symfony\Config\Shopware\Sitemap\ExcludedUrlsConfig($value);
    }

    /**
     * @default 100
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function batchsize($value): static
    {
        $this->_usedProperties['batchsize'] = true;
        $this->batchsize = $value;

        return $this;
    }

    public function scheduledTask(array $value = []): \Symfony\Config\Shopware\Sitemap\ScheduledTaskConfig
    {
        if (null === $this->scheduledTask) {
            $this->_usedProperties['scheduledTask'] = true;
            $this->scheduledTask = new \Symfony\Config\Shopware\Sitemap\ScheduledTaskConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "scheduledTask()" has already been initialized. You cannot pass values the second time you call scheduledTask().');
        }

        return $this->scheduledTask;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('custom_urls', $config)) {
            $this->_usedProperties['customUrls'] = true;
            $this->customUrls = array_map(fn ($v) => new \Symfony\Config\Shopware\Sitemap\CustomUrlsConfig($v), $config['custom_urls']);
            unset($config['custom_urls']);
        }

        if (array_key_exists('excluded_urls', $config)) {
            $this->_usedProperties['excludedUrls'] = true;
            $this->excludedUrls = array_map(fn ($v) => new \Symfony\Config\Shopware\Sitemap\ExcludedUrlsConfig($v), $config['excluded_urls']);
            unset($config['excluded_urls']);
        }

        if (array_key_exists('batchsize', $config)) {
            $this->_usedProperties['batchsize'] = true;
            $this->batchsize = $config['batchsize'];
            unset($config['batchsize']);
        }

        if (array_key_exists('scheduled_task', $config)) {
            $this->_usedProperties['scheduledTask'] = true;
            $this->scheduledTask = new \Symfony\Config\Shopware\Sitemap\ScheduledTaskConfig($config['scheduled_task']);
            unset($config['scheduled_task']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['customUrls'])) {
            $output['custom_urls'] = array_map(fn ($v) => $v->toArray(), $this->customUrls);
        }
        if (isset($this->_usedProperties['excludedUrls'])) {
            $output['excluded_urls'] = array_map(fn ($v) => $v->toArray(), $this->excludedUrls);
        }
        if (isset($this->_usedProperties['batchsize'])) {
            $output['batchsize'] = $this->batchsize;
        }
        if (isset($this->_usedProperties['scheduledTask'])) {
            $output['scheduled_task'] = $this->scheduledTask->toArray();
        }

        return $output;
    }

}
