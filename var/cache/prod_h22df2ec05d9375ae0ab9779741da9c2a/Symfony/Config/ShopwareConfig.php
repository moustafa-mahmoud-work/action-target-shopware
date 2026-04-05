<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'HttpCacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'NumberRangeConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'ProfilerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'FilesystemConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'CdnConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'ApiConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'StoreConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'CartConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'SalesChannelContextConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'AdminWorkerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'AutoUpdateConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'SitemapConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'DeploymentConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'MediaConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'DalConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'MailConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'FeatureConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'LoggerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'CacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'HtmlSanitizerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'IncrementConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'TwigConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'DompdfConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'StockConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'UsageDataConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'FeatureToggleConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'StagingConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'SystemConfigConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'MessengerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'SearchConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'TelemetryConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'RedisConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'ProductStreamConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'AdminLoginConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'ProductConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Shopware'.\DIRECTORY_SEPARATOR.'WebhookConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class ShopwareConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $httpCache;
    private $numberRange;
    private $profiler;
    private $filesystem;
    private $cdn;
    private $api;
    private $store;
    private $cart;
    private $salesChannelContext;
    private $adminWorker;
    private $autoUpdate;
    private $sitemap;
    private $deployment;
    private $media;
    private $dal;
    private $mail;
    private $feature;
    private $logger;
    private $cache;
    private $htmlSanitizer;
    private $increment;
    private $twig;
    private $dompdf;
    private $stock;
    private $usageData;
    private $featureToggle;
    private $staging;
    private $systemConfig;
    private $messenger;
    private $search;
    private $telemetry;
    private $redis;
    private $productStream;
    private $adminLogin;
    private $product;
    private $webhook;
    private $_usedProperties = [];
    private $_hasDeprecatedCalls = false;

    /**
     * @deprecated since Symfony 7.4
     */
    public function httpCache(array $value = []): \Symfony\Config\Shopware\HttpCacheConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->httpCache) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = new \Symfony\Config\Shopware\HttpCacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "httpCache()" has already been initialized. You cannot pass values the second time you call httpCache().');
        }

        return $this->httpCache;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function numberRange(array $value = []): \Symfony\Config\Shopware\NumberRangeConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->numberRange) {
            $this->_usedProperties['numberRange'] = true;
            $this->numberRange = new \Symfony\Config\Shopware\NumberRangeConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "numberRange()" has already been initialized. You cannot pass values the second time you call numberRange().');
        }

        return $this->numberRange;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function profiler(array $value = []): \Symfony\Config\Shopware\ProfilerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->profiler) {
            $this->_usedProperties['profiler'] = true;
            $this->profiler = new \Symfony\Config\Shopware\ProfilerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "profiler()" has already been initialized. You cannot pass values the second time you call profiler().');
        }

        return $this->profiler;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function filesystem(array $value = []): \Symfony\Config\Shopware\FilesystemConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->filesystem) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\Shopware\FilesystemConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "filesystem()" has already been initialized. You cannot pass values the second time you call filesystem().');
        }

        return $this->filesystem;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function cdn(array $value = []): \Symfony\Config\Shopware\CdnConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->cdn) {
            $this->_usedProperties['cdn'] = true;
            $this->cdn = new \Symfony\Config\Shopware\CdnConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cdn()" has already been initialized. You cannot pass values the second time you call cdn().');
        }

        return $this->cdn;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function api(array $value = []): \Symfony\Config\Shopware\ApiConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->api) {
            $this->_usedProperties['api'] = true;
            $this->api = new \Symfony\Config\Shopware\ApiConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "api()" has already been initialized. You cannot pass values the second time you call api().');
        }

        return $this->api;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function store(array $value = []): \Symfony\Config\Shopware\StoreConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->store) {
            $this->_usedProperties['store'] = true;
            $this->store = new \Symfony\Config\Shopware\StoreConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "store()" has already been initialized. You cannot pass values the second time you call store().');
        }

        return $this->store;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function cart(array $value = []): \Symfony\Config\Shopware\CartConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->cart) {
            $this->_usedProperties['cart'] = true;
            $this->cart = new \Symfony\Config\Shopware\CartConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cart()" has already been initialized. You cannot pass values the second time you call cart().');
        }

        return $this->cart;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function salesChannelContext(array $value = []): \Symfony\Config\Shopware\SalesChannelContextConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->salesChannelContext) {
            $this->_usedProperties['salesChannelContext'] = true;
            $this->salesChannelContext = new \Symfony\Config\Shopware\SalesChannelContextConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "salesChannelContext()" has already been initialized. You cannot pass values the second time you call salesChannelContext().');
        }

        return $this->salesChannelContext;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function adminWorker(array $value = []): \Symfony\Config\Shopware\AdminWorkerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->adminWorker) {
            $this->_usedProperties['adminWorker'] = true;
            $this->adminWorker = new \Symfony\Config\Shopware\AdminWorkerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "adminWorker()" has already been initialized. You cannot pass values the second time you call adminWorker().');
        }

        return $this->adminWorker;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function autoUpdate(array $value = []): \Symfony\Config\Shopware\AutoUpdateConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->autoUpdate) {
            $this->_usedProperties['autoUpdate'] = true;
            $this->autoUpdate = new \Symfony\Config\Shopware\AutoUpdateConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "autoUpdate()" has already been initialized. You cannot pass values the second time you call autoUpdate().');
        }

        return $this->autoUpdate;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function sitemap(array $value = []): \Symfony\Config\Shopware\SitemapConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->sitemap) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\Shopware\SitemapConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "sitemap()" has already been initialized. You cannot pass values the second time you call sitemap().');
        }

        return $this->sitemap;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function deployment(array $value = []): \Symfony\Config\Shopware\DeploymentConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->deployment) {
            $this->_usedProperties['deployment'] = true;
            $this->deployment = new \Symfony\Config\Shopware\DeploymentConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "deployment()" has already been initialized. You cannot pass values the second time you call deployment().');
        }

        return $this->deployment;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function media(array $value = []): \Symfony\Config\Shopware\MediaConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->media) {
            $this->_usedProperties['media'] = true;
            $this->media = new \Symfony\Config\Shopware\MediaConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "media()" has already been initialized. You cannot pass values the second time you call media().');
        }

        return $this->media;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function dal(array $value = []): \Symfony\Config\Shopware\DalConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->dal) {
            $this->_usedProperties['dal'] = true;
            $this->dal = new \Symfony\Config\Shopware\DalConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "dal()" has already been initialized. You cannot pass values the second time you call dal().');
        }

        return $this->dal;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function mail(array $value = []): \Symfony\Config\Shopware\MailConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->mail) {
            $this->_usedProperties['mail'] = true;
            $this->mail = new \Symfony\Config\Shopware\MailConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "mail()" has already been initialized. You cannot pass values the second time you call mail().');
        }

        return $this->mail;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function feature(array $value = []): \Symfony\Config\Shopware\FeatureConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->feature) {
            $this->_usedProperties['feature'] = true;
            $this->feature = new \Symfony\Config\Shopware\FeatureConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "feature()" has already been initialized. You cannot pass values the second time you call feature().');
        }

        return $this->feature;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function logger(array $value = []): \Symfony\Config\Shopware\LoggerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->logger) {
            $this->_usedProperties['logger'] = true;
            $this->logger = new \Symfony\Config\Shopware\LoggerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "logger()" has already been initialized. You cannot pass values the second time you call logger().');
        }

        return $this->logger;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function cache(array $value = []): \Symfony\Config\Shopware\CacheConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->cache) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\Shopware\CacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "cache()" has already been initialized. You cannot pass values the second time you call cache().');
        }

        return $this->cache;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function htmlSanitizer(array $value = []): \Symfony\Config\Shopware\HtmlSanitizerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->htmlSanitizer) {
            $this->_usedProperties['htmlSanitizer'] = true;
            $this->htmlSanitizer = new \Symfony\Config\Shopware\HtmlSanitizerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "htmlSanitizer()" has already been initialized. You cannot pass values the second time you call htmlSanitizer().');
        }

        return $this->htmlSanitizer;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function increment(string $name, array $value = []): \Symfony\Config\Shopware\IncrementConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (!isset($this->increment[$name])) {
            $this->_usedProperties['increment'] = true;
            $this->increment[$name] = new \Symfony\Config\Shopware\IncrementConfig($value);
        } elseif (1 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "increment()" has already been initialized. You cannot pass values the second time you call increment().');
        }

        return $this->increment[$name];
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function twig(array $value = []): \Symfony\Config\Shopware\TwigConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->twig) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\Shopware\TwigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "twig()" has already been initialized. You cannot pass values the second time you call twig().');
        }

        return $this->twig;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function dompdf(array $value = []): \Symfony\Config\Shopware\DompdfConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->dompdf) {
            $this->_usedProperties['dompdf'] = true;
            $this->dompdf = new \Symfony\Config\Shopware\DompdfConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "dompdf()" has already been initialized. You cannot pass values the second time you call dompdf().');
        }

        return $this->dompdf;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function stock(array $value = []): \Symfony\Config\Shopware\StockConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->stock) {
            $this->_usedProperties['stock'] = true;
            $this->stock = new \Symfony\Config\Shopware\StockConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "stock()" has already been initialized. You cannot pass values the second time you call stock().');
        }

        return $this->stock;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function usageData(array $value = []): \Symfony\Config\Shopware\UsageDataConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->usageData) {
            $this->_usedProperties['usageData'] = true;
            $this->usageData = new \Symfony\Config\Shopware\UsageDataConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "usageData()" has already been initialized. You cannot pass values the second time you call usageData().');
        }

        return $this->usageData;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function featureToggle(array $value = []): \Symfony\Config\Shopware\FeatureToggleConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->featureToggle) {
            $this->_usedProperties['featureToggle'] = true;
            $this->featureToggle = new \Symfony\Config\Shopware\FeatureToggleConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "featureToggle()" has already been initialized. You cannot pass values the second time you call featureToggle().');
        }

        return $this->featureToggle;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function staging(array $value = []): \Symfony\Config\Shopware\StagingConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->staging) {
            $this->_usedProperties['staging'] = true;
            $this->staging = new \Symfony\Config\Shopware\StagingConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "staging()" has already been initialized. You cannot pass values the second time you call staging().');
        }

        return $this->staging;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function systemConfig(array $value = []): \Symfony\Config\Shopware\SystemConfigConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->systemConfig) {
            $this->_usedProperties['systemConfig'] = true;
            $this->systemConfig = new \Symfony\Config\Shopware\SystemConfigConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "systemConfig()" has already been initialized. You cannot pass values the second time you call systemConfig().');
        }

        return $this->systemConfig;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function messenger(array $value = []): \Symfony\Config\Shopware\MessengerConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->messenger) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\Shopware\MessengerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "messenger()" has already been initialized. You cannot pass values the second time you call messenger().');
        }

        return $this->messenger;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function search(array $value = []): \Symfony\Config\Shopware\SearchConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->search) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Shopware\SearchConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "search()" has already been initialized. You cannot pass values the second time you call search().');
        }

        return $this->search;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function telemetry(array $value = []): \Symfony\Config\Shopware\TelemetryConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->telemetry) {
            $this->_usedProperties['telemetry'] = true;
            $this->telemetry = new \Symfony\Config\Shopware\TelemetryConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "telemetry()" has already been initialized. You cannot pass values the second time you call telemetry().');
        }

        return $this->telemetry;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function redis(array $value = []): \Symfony\Config\Shopware\RedisConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->redis) {
            $this->_usedProperties['redis'] = true;
            $this->redis = new \Symfony\Config\Shopware\RedisConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "redis()" has already been initialized. You cannot pass values the second time you call redis().');
        }

        return $this->redis;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function productStream(array $value = []): \Symfony\Config\Shopware\ProductStreamConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->productStream) {
            $this->_usedProperties['productStream'] = true;
            $this->productStream = new \Symfony\Config\Shopware\ProductStreamConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "productStream()" has already been initialized. You cannot pass values the second time you call productStream().');
        }

        return $this->productStream;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function adminLogin(array $value = []): \Symfony\Config\Shopware\AdminLoginConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->adminLogin) {
            $this->_usedProperties['adminLogin'] = true;
            $this->adminLogin = new \Symfony\Config\Shopware\AdminLoginConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "adminLogin()" has already been initialized. You cannot pass values the second time you call adminLogin().');
        }

        return $this->adminLogin;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function product(array $value = []): \Symfony\Config\Shopware\ProductConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->product) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\Shopware\ProductConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "product()" has already been initialized. You cannot pass values the second time you call product().');
        }

        return $this->product;
    }

    /**
     * @deprecated since Symfony 7.4
     */
    public function webhook(array $value = []): \Symfony\Config\Shopware\WebhookConfig
    {
        $this->_hasDeprecatedCalls = true;
        if (null === $this->webhook) {
            $this->_usedProperties['webhook'] = true;
            $this->webhook = new \Symfony\Config\Shopware\WebhookConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "webhook()" has already been initialized. You cannot pass values the second time you call webhook().');
        }

        return $this->webhook;
    }

    public function getExtensionAlias(): string
    {
        return 'shopware';
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('http_cache', $config)) {
            $this->_usedProperties['httpCache'] = true;
            $this->httpCache = new \Symfony\Config\Shopware\HttpCacheConfig($config['http_cache']);
            unset($config['http_cache']);
        }

        if (array_key_exists('number_range', $config)) {
            $this->_usedProperties['numberRange'] = true;
            $this->numberRange = new \Symfony\Config\Shopware\NumberRangeConfig($config['number_range']);
            unset($config['number_range']);
        }

        if (array_key_exists('profiler', $config)) {
            $this->_usedProperties['profiler'] = true;
            $this->profiler = new \Symfony\Config\Shopware\ProfilerConfig($config['profiler']);
            unset($config['profiler']);
        }

        if (array_key_exists('filesystem', $config)) {
            $this->_usedProperties['filesystem'] = true;
            $this->filesystem = new \Symfony\Config\Shopware\FilesystemConfig($config['filesystem']);
            unset($config['filesystem']);
        }

        if (array_key_exists('cdn', $config)) {
            $this->_usedProperties['cdn'] = true;
            $this->cdn = new \Symfony\Config\Shopware\CdnConfig($config['cdn']);
            unset($config['cdn']);
        }

        if (array_key_exists('api', $config)) {
            $this->_usedProperties['api'] = true;
            $this->api = new \Symfony\Config\Shopware\ApiConfig($config['api']);
            unset($config['api']);
        }

        if (array_key_exists('store', $config)) {
            $this->_usedProperties['store'] = true;
            $this->store = new \Symfony\Config\Shopware\StoreConfig($config['store']);
            unset($config['store']);
        }

        if (array_key_exists('cart', $config)) {
            $this->_usedProperties['cart'] = true;
            $this->cart = new \Symfony\Config\Shopware\CartConfig($config['cart']);
            unset($config['cart']);
        }

        if (array_key_exists('sales_channel_context', $config)) {
            $this->_usedProperties['salesChannelContext'] = true;
            $this->salesChannelContext = new \Symfony\Config\Shopware\SalesChannelContextConfig($config['sales_channel_context']);
            unset($config['sales_channel_context']);
        }

        if (array_key_exists('admin_worker', $config)) {
            $this->_usedProperties['adminWorker'] = true;
            $this->adminWorker = new \Symfony\Config\Shopware\AdminWorkerConfig($config['admin_worker']);
            unset($config['admin_worker']);
        }

        if (array_key_exists('auto_update', $config)) {
            $this->_usedProperties['autoUpdate'] = true;
            $this->autoUpdate = new \Symfony\Config\Shopware\AutoUpdateConfig($config['auto_update']);
            unset($config['auto_update']);
        }

        if (array_key_exists('sitemap', $config)) {
            $this->_usedProperties['sitemap'] = true;
            $this->sitemap = new \Symfony\Config\Shopware\SitemapConfig($config['sitemap']);
            unset($config['sitemap']);
        }

        if (array_key_exists('deployment', $config)) {
            $this->_usedProperties['deployment'] = true;
            $this->deployment = new \Symfony\Config\Shopware\DeploymentConfig($config['deployment']);
            unset($config['deployment']);
        }

        if (array_key_exists('media', $config)) {
            $this->_usedProperties['media'] = true;
            $this->media = new \Symfony\Config\Shopware\MediaConfig($config['media']);
            unset($config['media']);
        }

        if (array_key_exists('dal', $config)) {
            $this->_usedProperties['dal'] = true;
            $this->dal = new \Symfony\Config\Shopware\DalConfig($config['dal']);
            unset($config['dal']);
        }

        if (array_key_exists('mail', $config)) {
            $this->_usedProperties['mail'] = true;
            $this->mail = new \Symfony\Config\Shopware\MailConfig($config['mail']);
            unset($config['mail']);
        }

        if (array_key_exists('feature', $config)) {
            $this->_usedProperties['feature'] = true;
            $this->feature = new \Symfony\Config\Shopware\FeatureConfig($config['feature']);
            unset($config['feature']);
        }

        if (array_key_exists('logger', $config)) {
            $this->_usedProperties['logger'] = true;
            $this->logger = new \Symfony\Config\Shopware\LoggerConfig($config['logger']);
            unset($config['logger']);
        }

        if (array_key_exists('cache', $config)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = new \Symfony\Config\Shopware\CacheConfig($config['cache']);
            unset($config['cache']);
        }

        if (array_key_exists('html_sanitizer', $config)) {
            $this->_usedProperties['htmlSanitizer'] = true;
            $this->htmlSanitizer = new \Symfony\Config\Shopware\HtmlSanitizerConfig($config['html_sanitizer']);
            unset($config['html_sanitizer']);
        }

        if (array_key_exists('increment', $config)) {
            $this->_usedProperties['increment'] = true;
            $this->increment = array_map(fn ($v) => new \Symfony\Config\Shopware\IncrementConfig($v), $config['increment']);
            unset($config['increment']);
        }

        if (array_key_exists('twig', $config)) {
            $this->_usedProperties['twig'] = true;
            $this->twig = new \Symfony\Config\Shopware\TwigConfig($config['twig']);
            unset($config['twig']);
        }

        if (array_key_exists('dompdf', $config)) {
            $this->_usedProperties['dompdf'] = true;
            $this->dompdf = new \Symfony\Config\Shopware\DompdfConfig($config['dompdf']);
            unset($config['dompdf']);
        }

        if (array_key_exists('stock', $config)) {
            $this->_usedProperties['stock'] = true;
            $this->stock = new \Symfony\Config\Shopware\StockConfig($config['stock']);
            unset($config['stock']);
        }

        if (array_key_exists('usage_data', $config)) {
            $this->_usedProperties['usageData'] = true;
            $this->usageData = new \Symfony\Config\Shopware\UsageDataConfig($config['usage_data']);
            unset($config['usage_data']);
        }

        if (array_key_exists('feature_toggle', $config)) {
            $this->_usedProperties['featureToggle'] = true;
            $this->featureToggle = new \Symfony\Config\Shopware\FeatureToggleConfig($config['feature_toggle']);
            unset($config['feature_toggle']);
        }

        if (array_key_exists('staging', $config)) {
            $this->_usedProperties['staging'] = true;
            $this->staging = new \Symfony\Config\Shopware\StagingConfig($config['staging']);
            unset($config['staging']);
        }

        if (array_key_exists('system_config', $config)) {
            $this->_usedProperties['systemConfig'] = true;
            $this->systemConfig = new \Symfony\Config\Shopware\SystemConfigConfig($config['system_config']);
            unset($config['system_config']);
        }

        if (array_key_exists('messenger', $config)) {
            $this->_usedProperties['messenger'] = true;
            $this->messenger = new \Symfony\Config\Shopware\MessengerConfig($config['messenger']);
            unset($config['messenger']);
        }

        if (array_key_exists('search', $config)) {
            $this->_usedProperties['search'] = true;
            $this->search = new \Symfony\Config\Shopware\SearchConfig($config['search']);
            unset($config['search']);
        }

        if (array_key_exists('telemetry', $config)) {
            $this->_usedProperties['telemetry'] = true;
            $this->telemetry = new \Symfony\Config\Shopware\TelemetryConfig($config['telemetry']);
            unset($config['telemetry']);
        }

        if (array_key_exists('redis', $config)) {
            $this->_usedProperties['redis'] = true;
            $this->redis = new \Symfony\Config\Shopware\RedisConfig($config['redis']);
            unset($config['redis']);
        }

        if (array_key_exists('product_stream', $config)) {
            $this->_usedProperties['productStream'] = true;
            $this->productStream = new \Symfony\Config\Shopware\ProductStreamConfig($config['product_stream']);
            unset($config['product_stream']);
        }

        if (array_key_exists('admin_login', $config)) {
            $this->_usedProperties['adminLogin'] = true;
            $this->adminLogin = new \Symfony\Config\Shopware\AdminLoginConfig($config['admin_login']);
            unset($config['admin_login']);
        }

        if (array_key_exists('product', $config)) {
            $this->_usedProperties['product'] = true;
            $this->product = new \Symfony\Config\Shopware\ProductConfig($config['product']);
            unset($config['product']);
        }

        if (array_key_exists('webhook', $config)) {
            $this->_usedProperties['webhook'] = true;
            $this->webhook = new \Symfony\Config\Shopware\WebhookConfig($config['webhook']);
            unset($config['webhook']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['httpCache'])) {
            $output['http_cache'] = $this->httpCache->toArray();
        }
        if (isset($this->_usedProperties['numberRange'])) {
            $output['number_range'] = $this->numberRange->toArray();
        }
        if (isset($this->_usedProperties['profiler'])) {
            $output['profiler'] = $this->profiler->toArray();
        }
        if (isset($this->_usedProperties['filesystem'])) {
            $output['filesystem'] = $this->filesystem->toArray();
        }
        if (isset($this->_usedProperties['cdn'])) {
            $output['cdn'] = $this->cdn->toArray();
        }
        if (isset($this->_usedProperties['api'])) {
            $output['api'] = $this->api->toArray();
        }
        if (isset($this->_usedProperties['store'])) {
            $output['store'] = $this->store->toArray();
        }
        if (isset($this->_usedProperties['cart'])) {
            $output['cart'] = $this->cart->toArray();
        }
        if (isset($this->_usedProperties['salesChannelContext'])) {
            $output['sales_channel_context'] = $this->salesChannelContext->toArray();
        }
        if (isset($this->_usedProperties['adminWorker'])) {
            $output['admin_worker'] = $this->adminWorker->toArray();
        }
        if (isset($this->_usedProperties['autoUpdate'])) {
            $output['auto_update'] = $this->autoUpdate->toArray();
        }
        if (isset($this->_usedProperties['sitemap'])) {
            $output['sitemap'] = $this->sitemap->toArray();
        }
        if (isset($this->_usedProperties['deployment'])) {
            $output['deployment'] = $this->deployment->toArray();
        }
        if (isset($this->_usedProperties['media'])) {
            $output['media'] = $this->media->toArray();
        }
        if (isset($this->_usedProperties['dal'])) {
            $output['dal'] = $this->dal->toArray();
        }
        if (isset($this->_usedProperties['mail'])) {
            $output['mail'] = $this->mail->toArray();
        }
        if (isset($this->_usedProperties['feature'])) {
            $output['feature'] = $this->feature->toArray();
        }
        if (isset($this->_usedProperties['logger'])) {
            $output['logger'] = $this->logger->toArray();
        }
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache->toArray();
        }
        if (isset($this->_usedProperties['htmlSanitizer'])) {
            $output['html_sanitizer'] = $this->htmlSanitizer->toArray();
        }
        if (isset($this->_usedProperties['increment'])) {
            $output['increment'] = array_map(fn ($v) => $v->toArray(), $this->increment);
        }
        if (isset($this->_usedProperties['twig'])) {
            $output['twig'] = $this->twig->toArray();
        }
        if (isset($this->_usedProperties['dompdf'])) {
            $output['dompdf'] = $this->dompdf->toArray();
        }
        if (isset($this->_usedProperties['stock'])) {
            $output['stock'] = $this->stock->toArray();
        }
        if (isset($this->_usedProperties['usageData'])) {
            $output['usage_data'] = $this->usageData->toArray();
        }
        if (isset($this->_usedProperties['featureToggle'])) {
            $output['feature_toggle'] = $this->featureToggle->toArray();
        }
        if (isset($this->_usedProperties['staging'])) {
            $output['staging'] = $this->staging->toArray();
        }
        if (isset($this->_usedProperties['systemConfig'])) {
            $output['system_config'] = $this->systemConfig->toArray();
        }
        if (isset($this->_usedProperties['messenger'])) {
            $output['messenger'] = $this->messenger->toArray();
        }
        if (isset($this->_usedProperties['search'])) {
            $output['search'] = $this->search->toArray();
        }
        if (isset($this->_usedProperties['telemetry'])) {
            $output['telemetry'] = $this->telemetry->toArray();
        }
        if (isset($this->_usedProperties['redis'])) {
            $output['redis'] = $this->redis->toArray();
        }
        if (isset($this->_usedProperties['productStream'])) {
            $output['product_stream'] = $this->productStream->toArray();
        }
        if (isset($this->_usedProperties['adminLogin'])) {
            $output['admin_login'] = $this->adminLogin->toArray();
        }
        if (isset($this->_usedProperties['product'])) {
            $output['product'] = $this->product->toArray();
        }
        if (isset($this->_usedProperties['webhook'])) {
            $output['webhook'] = $this->webhook->toArray();
        }
        if ($this->_hasDeprecatedCalls) {
            trigger_deprecation('symfony/config', '7.4', 'Calling any fluent method on "%s" is deprecated; pass the configuration to the constructor instead.', $this::class);
        }

        return $output;
    }

}
