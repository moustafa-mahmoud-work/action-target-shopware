<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class TwigConfig 
{
    private $allowedPhpFunctions;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowedPhpFunctions(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowedPhpFunctions'] = true;
        $this->allowedPhpFunctions = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('allowed_php_functions', $config)) {
            $this->_usedProperties['allowedPhpFunctions'] = true;
            $this->allowedPhpFunctions = $config['allowed_php_functions'];
            unset($config['allowed_php_functions']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['allowedPhpFunctions'])) {
            $output['allowed_php_functions'] = $this->allowedPhpFunctions;
        }

        return $output;
    }

}
