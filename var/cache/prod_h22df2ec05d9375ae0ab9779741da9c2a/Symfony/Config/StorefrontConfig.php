<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Storefront'.\DIRECTORY_SEPARATOR.'ThemeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Storefront'.\DIRECTORY_SEPARATOR.'RouterConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class StorefrontConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $theme;
    private $router;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * @default {"config_loader_id":"Shopware\\Storefront\\Theme\\ConfigLoader\\DatabaseConfigLoader","theme_path_builder_id":"Shopware\\Storefront\\Theme\\SeedingThemePathBuilder","available_theme_provider":"Shopware\\Storefront\\Theme\\ConfigLoader\\DatabaseAvailableThemeProvider","file_delete_delay":900,"allowed_scss_values":["^\\$.*"],"validate_on_compile":false}
     * @deprecated since Symfony 7.4
     */
    public function theme(array $value = []): \Symfony\Config\Storefront\ThemeConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->theme) {
            $this->_usedProperties['theme'] = true;
            $this->theme = new \Symfony\Config\Storefront\ThemeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "theme()" has already been initialized. You cannot pass values the second time you call theme().');
        }

        return $this->theme;
    }

    /**
     * @default {"allowed_routes":[]}
     * @deprecated since Symfony 7.4
     */
    public function router(array $value = []): \Symfony\Config\Storefront\RouterConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->router) {
            $this->_usedProperties['router'] = true;
            $this->router = new \Symfony\Config\Storefront\RouterConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "router()" has already been initialized. You cannot pass values the second time you call router().');
        }

        return $this->router;
    }

    public function getExtensionAlias(): string
    {
        return 'storefront';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('theme', $config)) {
            $this->_usedProperties['theme'] = true;
            $this->theme = new \Symfony\Config\Storefront\ThemeConfig($config['theme']);
            unset($config['theme']);
        }

        if (array_key_exists('router', $config)) {
            $this->_usedProperties['router'] = true;
            $this->router = new \Symfony\Config\Storefront\RouterConfig($config['router']);
            unset($config['router']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['theme'])) {
            $output['theme'] = $this->theme->toArray();
        }
        if (isset($this->_usedProperties['router'])) {
            $output['router'] = $this->router->toArray();
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
