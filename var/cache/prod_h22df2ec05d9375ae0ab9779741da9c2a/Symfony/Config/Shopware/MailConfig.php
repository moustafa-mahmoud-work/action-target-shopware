<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MailConfig 
{
    private $updateMailVariablesOnSend;
    private $maxBodyLength;
    private $_usedProperties = [];

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function updateMailVariablesOnSend($value): static
    {
        $this->_usedProperties['updateMailVariablesOnSend'] = true;
        $this->updateMailVariablesOnSend = $value;

        return $this;
    }

    /**
     * @default 0
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function maxBodyLength($value): static
    {
        $this->_usedProperties['maxBodyLength'] = true;
        $this->maxBodyLength = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('update_mail_variables_on_send', $config)) {
            $this->_usedProperties['updateMailVariablesOnSend'] = true;
            $this->updateMailVariablesOnSend = $config['update_mail_variables_on_send'];
            unset($config['update_mail_variables_on_send']);
        }

        if (array_key_exists('max_body_length', $config)) {
            $this->_usedProperties['maxBodyLength'] = true;
            $this->maxBodyLength = $config['max_body_length'];
            unset($config['max_body_length']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['updateMailVariablesOnSend'])) {
            $output['update_mail_variables_on_send'] = $this->updateMailVariablesOnSend;
        }
        if (isset($this->_usedProperties['maxBodyLength'])) {
            $output['max_body_length'] = $this->maxBodyLength;
        }

        return $output;
    }

}
