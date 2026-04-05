<?php

namespace Symfony\Config\Shopware\Staging;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MailingConfig 
{
    private $disableDelivery;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function disableDelivery($value): static
    {
        $this->_usedProperties['disableDelivery'] = true;
        $this->disableDelivery = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('disable_delivery', $config)) {
            $this->_usedProperties['disableDelivery'] = true;
            $this->disableDelivery = $config['disable_delivery'];
            unset($config['disable_delivery']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['disableDelivery'])) {
            $output['disable_delivery'] = $this->disableDelivery;
        }

        return $output;
    }

}
