<?php

namespace Symfony\Config\Shopware;

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class AdminLoginConfig 
{
    private $useDefault;
    private $clientId;
    private $clientSecret;
    private $redirectUri;
    private $baseUrl;
    private $authorizePath;
    private $tokenPath;
    private $jwksPath;
    private $scope;
    private $registerUrl;
    private $_usedProperties = [];

    /**
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function useDefault($value): static
    {
        $this->_usedProperties['useDefault'] = true;
        $this->useDefault = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientId($value): static
    {
        $this->_usedProperties['clientId'] = true;
        $this->clientId = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function clientSecret($value): static
    {
        $this->_usedProperties['clientSecret'] = true;
        $this->clientSecret = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function redirectUri($value): static
    {
        $this->_usedProperties['redirectUri'] = true;
        $this->redirectUri = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function baseUrl($value): static
    {
        $this->_usedProperties['baseUrl'] = true;
        $this->baseUrl = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function authorizePath($value): static
    {
        $this->_usedProperties['authorizePath'] = true;
        $this->authorizePath = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function tokenPath($value): static
    {
        $this->_usedProperties['tokenPath'] = true;
        $this->tokenPath = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function jwksPath($value): static
    {
        $this->_usedProperties['jwksPath'] = true;
        $this->jwksPath = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function scope($value): static
    {
        $this->_usedProperties['scope'] = true;
        $this->scope = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function registerUrl($value): static
    {
        $this->_usedProperties['registerUrl'] = true;
        $this->registerUrl = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('use_default', $config)) {
            $this->_usedProperties['useDefault'] = true;
            $this->useDefault = $config['use_default'];
            unset($config['use_default']);
        }

        if (array_key_exists('client_id', $config)) {
            $this->_usedProperties['clientId'] = true;
            $this->clientId = $config['client_id'];
            unset($config['client_id']);
        }

        if (array_key_exists('client_secret', $config)) {
            $this->_usedProperties['clientSecret'] = true;
            $this->clientSecret = $config['client_secret'];
            unset($config['client_secret']);
        }

        if (array_key_exists('redirect_uri', $config)) {
            $this->_usedProperties['redirectUri'] = true;
            $this->redirectUri = $config['redirect_uri'];
            unset($config['redirect_uri']);
        }

        if (array_key_exists('base_url', $config)) {
            $this->_usedProperties['baseUrl'] = true;
            $this->baseUrl = $config['base_url'];
            unset($config['base_url']);
        }

        if (array_key_exists('authorize_path', $config)) {
            $this->_usedProperties['authorizePath'] = true;
            $this->authorizePath = $config['authorize_path'];
            unset($config['authorize_path']);
        }

        if (array_key_exists('token_path', $config)) {
            $this->_usedProperties['tokenPath'] = true;
            $this->tokenPath = $config['token_path'];
            unset($config['token_path']);
        }

        if (array_key_exists('jwks_path', $config)) {
            $this->_usedProperties['jwksPath'] = true;
            $this->jwksPath = $config['jwks_path'];
            unset($config['jwks_path']);
        }

        if (array_key_exists('scope', $config)) {
            $this->_usedProperties['scope'] = true;
            $this->scope = $config['scope'];
            unset($config['scope']);
        }

        if (array_key_exists('register_url', $config)) {
            $this->_usedProperties['registerUrl'] = true;
            $this->registerUrl = $config['register_url'];
            unset($config['register_url']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['useDefault'])) {
            $output['use_default'] = $this->useDefault;
        }
        if (isset($this->_usedProperties['clientId'])) {
            $output['client_id'] = $this->clientId;
        }
        if (isset($this->_usedProperties['clientSecret'])) {
            $output['client_secret'] = $this->clientSecret;
        }
        if (isset($this->_usedProperties['redirectUri'])) {
            $output['redirect_uri'] = $this->redirectUri;
        }
        if (isset($this->_usedProperties['baseUrl'])) {
            $output['base_url'] = $this->baseUrl;
        }
        if (isset($this->_usedProperties['authorizePath'])) {
            $output['authorize_path'] = $this->authorizePath;
        }
        if (isset($this->_usedProperties['tokenPath'])) {
            $output['token_path'] = $this->tokenPath;
        }
        if (isset($this->_usedProperties['jwksPath'])) {
            $output['jwks_path'] = $this->jwksPath;
        }
        if (isset($this->_usedProperties['scope'])) {
            $output['scope'] = $this->scope;
        }
        if (isset($this->_usedProperties['registerUrl'])) {
            $output['register_url'] = $this->registerUrl;
        }

        return $output;
    }

}
