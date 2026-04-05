<?php

namespace Symfony\Config\Shopware\Staging;

require_once __DIR__.\DIRECTORY_SEPARATOR.'SalesChannel'.\DIRECTORY_SEPARATOR.'DomainRewriteConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class SalesChannelConfig 
{
    private $domainRewrite;
    private $_usedProperties = [];

    public function domainRewrite(array $value = []): \Symfony\Config\Shopware\Staging\SalesChannel\DomainRewriteConfig
    {
        $this->_usedProperties['domainRewrite'] = true;

        return $this->domainRewrite[] = new \Symfony\Config\Shopware\Staging\SalesChannel\DomainRewriteConfig($value);
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('domain_rewrite', $config)) {
            $this->_usedProperties['domainRewrite'] = true;
            $this->domainRewrite = array_map(fn ($v) => new \Symfony\Config\Shopware\Staging\SalesChannel\DomainRewriteConfig($v), $config['domain_rewrite']);
            unset($config['domain_rewrite']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['domainRewrite'])) {
            $output['domain_rewrite'] = array_map(fn ($v) => $v->toArray(), $this->domainRewrite);
        }

        return $output;
    }

}
