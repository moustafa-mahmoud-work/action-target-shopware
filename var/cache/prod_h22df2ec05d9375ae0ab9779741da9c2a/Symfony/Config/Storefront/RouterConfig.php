<?php

namespace Symfony\Config\Storefront;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class RouterConfig 
{
    private $allowedRoutes;
    private $_usedProperties = [];

    /**
     * @param ParamConfigurator|list<ParamConfigurator|mixed> $value
     *
     * @return $this
     */
    public function allowedRoutes(ParamConfigurator|array $value): static
    {
        $this->_usedProperties['allowedRoutes'] = true;
        $this->allowedRoutes = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('allowed_routes', $config)) {
            $this->_usedProperties['allowedRoutes'] = true;
            $this->allowedRoutes = $config['allowed_routes'];
            unset($config['allowed_routes']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['allowedRoutes'])) {
            $output['allowed_routes'] = $this->allowedRoutes;
        }

        return $output;
    }

}
