<?php

namespace Symfony\Config\Elasticsearch\Ssl\SigV4;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class CredentialsProviderConfig 
{
    private $keyId;
    private $secretKey;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function keyId($value): static
    {
        $this->_usedProperties['keyId'] = true;
        $this->keyId = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function secretKey($value): static
    {
        $this->_usedProperties['secretKey'] = true;
        $this->secretKey = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('key_id', $config)) {
            $this->_usedProperties['keyId'] = true;
            $this->keyId = $config['key_id'];
            unset($config['key_id']);
        }

        if (array_key_exists('secret_key', $config)) {
            $this->_usedProperties['secretKey'] = true;
            $this->secretKey = $config['secret_key'];
            unset($config['secret_key']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['keyId'])) {
            $output['key_id'] = $this->keyId;
        }
        if (isset($this->_usedProperties['secretKey'])) {
            $output['secret_key'] = $this->secretKey;
        }

        return $output;
    }

}
