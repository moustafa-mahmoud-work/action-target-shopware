<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class DeploymentConfig 
{
    private $blueGreen;
    private $clusterSetup;
    private $runtimeExtensionManagement;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function blueGreen($value): static
    {
        $this->_usedProperties['blueGreen'] = true;
        $this->blueGreen = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function clusterSetup($value): static
    {
        $this->_usedProperties['clusterSetup'] = true;
        $this->clusterSetup = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function runtimeExtensionManagement($value): static
    {
        $this->_usedProperties['runtimeExtensionManagement'] = true;
        $this->runtimeExtensionManagement = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('blue_green', $config)) {
            $this->_usedProperties['blueGreen'] = true;
            $this->blueGreen = $config['blue_green'];
            unset($config['blue_green']);
        }

        if (array_key_exists('cluster_setup', $config)) {
            $this->_usedProperties['clusterSetup'] = true;
            $this->clusterSetup = $config['cluster_setup'];
            unset($config['cluster_setup']);
        }

        if (array_key_exists('runtime_extension_management', $config)) {
            $this->_usedProperties['runtimeExtensionManagement'] = true;
            $this->runtimeExtensionManagement = $config['runtime_extension_management'];
            unset($config['runtime_extension_management']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['blueGreen'])) {
            $output['blue_green'] = $this->blueGreen;
        }
        if (isset($this->_usedProperties['clusterSetup'])) {
            $output['cluster_setup'] = $this->clusterSetup;
        }
        if (isset($this->_usedProperties['runtimeExtensionManagement'])) {
            $output['runtime_extension_management'] = $this->runtimeExtensionManagement;
        }

        return $output;
    }

}
