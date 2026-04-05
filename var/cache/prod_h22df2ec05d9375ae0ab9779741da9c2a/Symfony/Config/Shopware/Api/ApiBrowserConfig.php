<?php

namespace Symfony\Config\Shopware\Api;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ApiBrowserConfig 
{
    private $authRequired;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function authRequired($value): static
    {
        $this->_usedProperties['authRequired'] = true;
        $this->authRequired = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('auth_required', $config)) {
            $this->_usedProperties['authRequired'] = true;
            $this->authRequired = $config['auth_required'];
            unset($config['auth_required']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['authRequired'])) {
            $output['auth_required'] = $this->authRequired;
        }

        return $output;
    }

}
