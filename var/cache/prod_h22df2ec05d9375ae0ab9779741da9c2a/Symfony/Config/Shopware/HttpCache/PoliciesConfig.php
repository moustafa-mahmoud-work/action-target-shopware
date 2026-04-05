<?php

namespace Symfony\Config\Shopware\HttpCache;

require_once __DIR__.\DIRECTORY_SEPARATOR.'PoliciesConfig'.\DIRECTORY_SEPARATOR.'HeadersConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class PoliciesConfig 
{
    private $headers;
    private $_usedProperties = [];

    public function headers(array $value = []): \Symfony\Config\Shopware\HttpCache\PoliciesConfig\HeadersConfig
    {
        if (null === $this->headers) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\Shopware\HttpCache\PoliciesConfig\HeadersConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "headers()" has already been initialized. You cannot pass values the second time you call headers().');
        }

        return $this->headers;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('headers', $config)) {
            $this->_usedProperties['headers'] = true;
            $this->headers = new \Symfony\Config\Shopware\HttpCache\PoliciesConfig\HeadersConfig($config['headers']);
            unset($config['headers']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['headers'])) {
            $output['headers'] = $this->headers->toArray();
        }

        return $output;
    }

}
