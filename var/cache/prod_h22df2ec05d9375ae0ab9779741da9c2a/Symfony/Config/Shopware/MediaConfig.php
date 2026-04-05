<?php

namespace Symfony\Config\Shopware;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Media'.\DIRECTORY_SEPARATOR.'RemoteThumbnailsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;

/**
 * This class is automatically generated to help in creating a config.
 */
class MediaConfig 
{
    private $remoteThumbnails;
    private $enableUrlUploadFeature;
    private $enableUrlValidation;
    private $urlUploadMaxSize;
    private $_usedProperties = [];

    public function remoteThumbnails(array $value = []): \Symfony\Config\Shopware\Media\RemoteThumbnailsConfig
    {
        if (null === $this->remoteThumbnails) {
            $this->_usedProperties['remoteThumbnails'] = true;
            $this->remoteThumbnails = new \Symfony\Config\Shopware\Media\RemoteThumbnailsConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "remoteThumbnails()" has already been initialized. You cannot pass values the second time you call remoteThumbnails().');
        }

        return $this->remoteThumbnails;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableUrlUploadFeature($value): static
    {
        $this->_usedProperties['enableUrlUploadFeature'] = true;
        $this->enableUrlUploadFeature = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function enableUrlValidation($value): static
    {
        $this->_usedProperties['enableUrlValidation'] = true;
        $this->enableUrlValidation = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function urlUploadMaxSize($value): static
    {
        $this->_usedProperties['urlUploadMaxSize'] = true;
        $this->urlUploadMaxSize = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('remote_thumbnails', $config)) {
            $this->_usedProperties['remoteThumbnails'] = true;
            $this->remoteThumbnails = new \Symfony\Config\Shopware\Media\RemoteThumbnailsConfig($config['remote_thumbnails']);
            unset($config['remote_thumbnails']);
        }

        if (array_key_exists('enable_url_upload_feature', $config)) {
            $this->_usedProperties['enableUrlUploadFeature'] = true;
            $this->enableUrlUploadFeature = $config['enable_url_upload_feature'];
            unset($config['enable_url_upload_feature']);
        }

        if (array_key_exists('enable_url_validation', $config)) {
            $this->_usedProperties['enableUrlValidation'] = true;
            $this->enableUrlValidation = $config['enable_url_validation'];
            unset($config['enable_url_validation']);
        }

        if (array_key_exists('url_upload_max_size', $config)) {
            $this->_usedProperties['urlUploadMaxSize'] = true;
            $this->urlUploadMaxSize = $config['url_upload_max_size'];
            unset($config['url_upload_max_size']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['remoteThumbnails'])) {
            $output['remote_thumbnails'] = $this->remoteThumbnails->toArray();
        }
        if (isset($this->_usedProperties['enableUrlUploadFeature'])) {
            $output['enable_url_upload_feature'] = $this->enableUrlUploadFeature;
        }
        if (isset($this->_usedProperties['enableUrlValidation'])) {
            $output['enable_url_validation'] = $this->enableUrlValidation;
        }
        if (isset($this->_usedProperties['urlUploadMaxSize'])) {
            $output['url_upload_max_size'] = $this->urlUploadMaxSize;
        }

        return $output;
    }

}
