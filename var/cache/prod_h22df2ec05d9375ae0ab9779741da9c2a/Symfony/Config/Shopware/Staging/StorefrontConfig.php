<?php

namespace Symfony\Config\Shopware\Staging;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StorefrontConfig 
{
    private $showBanner;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function showBanner($value): static
    {
        $this->_usedProperties['showBanner'] = true;
        $this->showBanner = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('show_banner', $config)) {
            $this->_usedProperties['showBanner'] = true;
            $this->showBanner = $config['show_banner'];
            unset($config['show_banner']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['showBanner'])) {
            $output['show_banner'] = $this->showBanner;
        }

        return $output;
    }

}
