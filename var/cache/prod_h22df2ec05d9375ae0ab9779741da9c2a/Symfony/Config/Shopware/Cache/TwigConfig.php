<?php

namespace Symfony\Config\Shopware\Cache;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TwigConfig 
{
    private $stringTemplateRendererCacheDir;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function stringTemplateRendererCacheDir($value): static
    {
        $this->_usedProperties['stringTemplateRendererCacheDir'] = true;
        $this->stringTemplateRendererCacheDir = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('string_template_renderer_cache_dir', $config)) {
            $this->_usedProperties['stringTemplateRendererCacheDir'] = true;
            $this->stringTemplateRendererCacheDir = $config['string_template_renderer_cache_dir'];
            unset($config['string_template_renderer_cache_dir']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['stringTemplateRendererCacheDir'])) {
            $output['string_template_renderer_cache_dir'] = $this->stringTemplateRendererCacheDir;
        }

        return $output;
    }

}
