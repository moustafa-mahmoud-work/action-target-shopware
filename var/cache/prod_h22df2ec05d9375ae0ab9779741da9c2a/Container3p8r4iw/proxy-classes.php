<?php

namespace Container3p8r4iw;


class ClientProxyDf0d0fc extends \OpenSearch\Client implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'asyncSearch' => [parent::class, 'asyncSearch', null, 8],
        "\0".'*'."\0".'cat' => [parent::class, 'cat', null, 8],
        "\0".'*'."\0".'cluster' => [parent::class, 'cluster', null, 8],
        "\0".'*'."\0".'danglingIndices' => [parent::class, 'danglingIndices', null, 8],
        "\0".'*'."\0".'dataFrameTransformDeprecated' => [parent::class, 'dataFrameTransformDeprecated', null, 8],
        "\0".'*'."\0".'endpoints' => [parent::class, 'endpoints', null, 8],
        "\0".'*'."\0".'indices' => [parent::class, 'indices', null, 8],
        "\0".'*'."\0".'ingest' => [parent::class, 'ingest', null, 8],
        "\0".'*'."\0".'knn' => [parent::class, 'knn', null, 8],
        "\0".'*'."\0".'ml' => [parent::class, 'ml', null, 8],
        "\0".'*'."\0".'monitoring' => [parent::class, 'monitoring', null, 8],
        "\0".'*'."\0".'nodes' => [parent::class, 'nodes', null, 8],
        "\0".'*'."\0".'notifications' => [parent::class, 'notifications', null, 8],
        "\0".'*'."\0".'observability' => [parent::class, 'observability', null, 8],
        "\0".'*'."\0".'params' => [parent::class, 'params', null, 8],
        "\0".'*'."\0".'ppl' => [parent::class, 'ppl', null, 8],
        "\0".'*'."\0".'query' => [parent::class, 'query', null, 8],
        "\0".'*'."\0".'registeredNamespaces' => [parent::class, 'registeredNamespaces', null, 8],
        "\0".'*'."\0".'remoteStore' => [parent::class, 'remoteStore', null, 8],
        "\0".'*'."\0".'rollups' => [parent::class, 'rollups', null, 8],
        "\0".'*'."\0".'searchPipeline' => [parent::class, 'searchPipeline', null, 8],
        "\0".'*'."\0".'searchableSnapshots' => [parent::class, 'searchableSnapshots', null, 8],
        "\0".'*'."\0".'security' => [parent::class, 'security', null, 8],
        "\0".'*'."\0".'snapshot' => [parent::class, 'snapshot', null, 8],
        "\0".'*'."\0".'sql' => [parent::class, 'sql', null, 8],
        "\0".'*'."\0".'ssl' => [parent::class, 'ssl', null, 8],
        "\0".'*'."\0".'tasks' => [parent::class, 'tasks', null, 8],
        "\0".'*'."\0".'transforms' => [parent::class, 'transforms', null, 8],
        'asyncSearch' => [parent::class, 'asyncSearch', null, 8],
        'cat' => [parent::class, 'cat', null, 8],
        'cluster' => [parent::class, 'cluster', null, 8],
        'danglingIndices' => [parent::class, 'danglingIndices', null, 8],
        'dataFrameTransformDeprecated' => [parent::class, 'dataFrameTransformDeprecated', null, 8],
        'endpoints' => [parent::class, 'endpoints', null, 8],
        'indices' => [parent::class, 'indices', null, 8],
        'ingest' => [parent::class, 'ingest', null, 8],
        'knn' => [parent::class, 'knn', null, 8],
        'ml' => [parent::class, 'ml', null, 8],
        'monitoring' => [parent::class, 'monitoring', null, 8],
        'nodes' => [parent::class, 'nodes', null, 8],
        'notifications' => [parent::class, 'notifications', null, 8],
        'observability' => [parent::class, 'observability', null, 8],
        'params' => [parent::class, 'params', null, 8],
        'ppl' => [parent::class, 'ppl', null, 8],
        'query' => [parent::class, 'query', null, 8],
        'registeredNamespaces' => [parent::class, 'registeredNamespaces', null, 8],
        'remoteStore' => [parent::class, 'remoteStore', null, 8],
        'rollups' => [parent::class, 'rollups', null, 8],
        'searchPipeline' => [parent::class, 'searchPipeline', null, 8],
        'searchableSnapshots' => [parent::class, 'searchableSnapshots', null, 8],
        'security' => [parent::class, 'security', null, 8],
        'snapshot' => [parent::class, 'snapshot', null, 8],
        'sql' => [parent::class, 'sql', null, 8],
        'ssl' => [parent::class, 'ssl', null, 8],
        'tasks' => [parent::class, 'tasks', null, 8],
        'transforms' => [parent::class, 'transforms', null, 8],
        'transport' => [parent::class, 'transport', null, 4],
    ];
    public function exists(array $params = []): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->exists(...\func_get_args());
        }
        return parent::exists(...\func_get_args());
    }
    public function existsSource(array $params = []): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->existsSource(...\func_get_args());
        }
        return parent::existsSource(...\func_get_args());
    }
    public function ping(array $params = []): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ping(...\func_get_args());
        }
        return parent::ping(...\func_get_args());
    }
    public function asyncSearch(): \OpenSearch\Namespaces\AsyncSearchNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->asyncSearch(...\func_get_args());
        }
        return parent::asyncSearch(...\func_get_args());
    }
    public function cat(): \OpenSearch\Namespaces\CatNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->cat(...\func_get_args());
        }
        return parent::cat(...\func_get_args());
    }
    public function cluster(): \OpenSearch\Namespaces\ClusterNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->cluster(...\func_get_args());
        }
        return parent::cluster(...\func_get_args());
    }
    public function danglingIndices(): \OpenSearch\Namespaces\DanglingIndicesNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->danglingIndices(...\func_get_args());
        }
        return parent::danglingIndices(...\func_get_args());
    }
    public function dataFrameTransformDeprecated(): \OpenSearch\Namespaces\DataFrameTransformDeprecatedNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->dataFrameTransformDeprecated(...\func_get_args());
        }
        return parent::dataFrameTransformDeprecated(...\func_get_args());
    }
    public function indices(): \OpenSearch\Namespaces\IndicesNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->indices(...\func_get_args());
        }
        return parent::indices(...\func_get_args());
    }
    public function ingest(): \OpenSearch\Namespaces\IngestNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ingest(...\func_get_args());
        }
        return parent::ingest(...\func_get_args());
    }
    public function knn(): \OpenSearch\Namespaces\KnnNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->knn(...\func_get_args());
        }
        return parent::knn(...\func_get_args());
    }
    public function ml(): \OpenSearch\Namespaces\MlNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ml(...\func_get_args());
        }
        return parent::ml(...\func_get_args());
    }
    public function monitoring(): \OpenSearch\Namespaces\MonitoringNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->monitoring(...\func_get_args());
        }
        return parent::monitoring(...\func_get_args());
    }
    public function nodes(): \OpenSearch\Namespaces\NodesNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->nodes(...\func_get_args());
        }
        return parent::nodes(...\func_get_args());
    }
    public function notifications(): \OpenSearch\Namespaces\NotificationsNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->notifications(...\func_get_args());
        }
        return parent::notifications(...\func_get_args());
    }
    public function observability(): \OpenSearch\Namespaces\ObservabilityNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->observability(...\func_get_args());
        }
        return parent::observability(...\func_get_args());
    }
    public function ppl(): \OpenSearch\Namespaces\PplNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ppl(...\func_get_args());
        }
        return parent::ppl(...\func_get_args());
    }
    public function query(): \OpenSearch\Namespaces\QueryNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->query(...\func_get_args());
        }
        return parent::query(...\func_get_args());
    }
    public function remoteStore(): \OpenSearch\Namespaces\RemoteStoreNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->remoteStore(...\func_get_args());
        }
        return parent::remoteStore(...\func_get_args());
    }
    public function rollups(): \OpenSearch\Namespaces\RollupsNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->rollups(...\func_get_args());
        }
        return parent::rollups(...\func_get_args());
    }
    public function searchPipeline(): \OpenSearch\Namespaces\SearchPipelineNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->searchPipeline(...\func_get_args());
        }
        return parent::searchPipeline(...\func_get_args());
    }
    public function searchableSnapshots(): \OpenSearch\Namespaces\SearchableSnapshotsNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->searchableSnapshots(...\func_get_args());
        }
        return parent::searchableSnapshots(...\func_get_args());
    }
    public function security(): \OpenSearch\Namespaces\SecurityNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->security(...\func_get_args());
        }
        return parent::security(...\func_get_args());
    }
    public function snapshot(): \OpenSearch\Namespaces\SnapshotNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->snapshot(...\func_get_args());
        }
        return parent::snapshot(...\func_get_args());
    }
    public function sql(): \OpenSearch\Namespaces\SqlNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->sql(...\func_get_args());
        }
        return parent::sql(...\func_get_args());
    }
    public function ssl(): \OpenSearch\Namespaces\SslNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ssl(...\func_get_args());
        }
        return parent::ssl(...\func_get_args());
    }
    public function tasks(): \OpenSearch\Namespaces\TasksNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->tasks(...\func_get_args());
        }
        return parent::tasks(...\func_get_args());
    }
    public function transforms(): \OpenSearch\Namespaces\TransformsNamespace
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->transforms(...\func_get_args());
        }
        return parent::transforms(...\func_get_args());
    }
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ClientProxyDf0d0fc', false)) {
    \class_alias(__NAMESPACE__.'\\ClientProxyDf0d0fc', 'ClientProxyDf0d0fc', false);
}

class CartServiceGhost1f3552a extends \Shopware\Core\Checkout\Cart\SalesChannel\CartService implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'calculator' => [parent::class, 'calculator', null, 530],
        "\0".parent::class."\0".'cart' => [parent::class, 'cart', null, 16],
        "\0".parent::class."\0".'cartFactory' => [parent::class, 'cartFactory', null, 530],
        "\0".parent::class."\0".'deleteRoute' => [parent::class, 'deleteRoute', null, 530],
        "\0".parent::class."\0".'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        "\0".parent::class."\0".'itemAddRoute' => [parent::class, 'itemAddRoute', null, 530],
        "\0".parent::class."\0".'itemRemoveRoute' => [parent::class, 'itemRemoveRoute', null, 530],
        "\0".parent::class."\0".'itemUpdateRoute' => [parent::class, 'itemUpdateRoute', null, 530],
        "\0".parent::class."\0".'loadRoute' => [parent::class, 'loadRoute', null, 530],
        "\0".parent::class."\0".'orderRoute' => [parent::class, 'orderRoute', null, 530],
        "\0".parent::class."\0".'persister' => [parent::class, 'persister', null, 530],
        'calculator' => [parent::class, 'calculator', null, 530],
        'cart' => [parent::class, 'cart', null, 16],
        'cartFactory' => [parent::class, 'cartFactory', null, 530],
        'deleteRoute' => [parent::class, 'deleteRoute', null, 530],
        'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        'itemAddRoute' => [parent::class, 'itemAddRoute', null, 530],
        'itemRemoveRoute' => [parent::class, 'itemRemoveRoute', null, 530],
        'itemUpdateRoute' => [parent::class, 'itemUpdateRoute', null, 530],
        'loadRoute' => [parent::class, 'loadRoute', null, 530],
        'orderRoute' => [parent::class, 'orderRoute', null, 530],
        'persister' => [parent::class, 'persister', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('CartServiceGhost1f3552a', false)) {
    \class_alias(__NAMESPACE__.'\\CartServiceGhost1f3552a', 'CartServiceGhost1f3552a', false);
}

class SeoUrlRouteRegistryGhost08f3672 extends \Shopware\Core\Content\Seo\SeoUrlRoute\SeoUrlRouteRegistry implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'definitionToRoutes' => [parent::class, 'definitionToRoutes', null, 16],
        "\0".parent::class."\0".'seoUrlRoutes' => [parent::class, 'seoUrlRoutes', null, 16],
        'definitionToRoutes' => [parent::class, 'definitionToRoutes', null, 16],
        'seoUrlRoutes' => [parent::class, 'seoUrlRoutes', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SeoUrlRouteRegistryGhost08f3672', false)) {
    \class_alias(__NAMESPACE__.'\\SeoUrlRouteRegistryGhost08f3672', 'SeoUrlRouteRegistryGhost08f3672', false);
}

class CacheInvalidatorGhost0edcb5d extends \Shopware\Core\Framework\Adapter\Cache\CacheInvalidator implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'adapters' => [parent::class, 'adapters', null, 530],
        "\0".parent::class."\0".'backtraceCollector' => [parent::class, 'backtraceCollector', null, 530],
        "\0".parent::class."\0".'cache' => [parent::class, 'cache', null, 530],
        "\0".parent::class."\0".'dispatcher' => [parent::class, 'dispatcher', null, 530],
        "\0".parent::class."\0".'httpCacheStore' => [parent::class, 'httpCacheStore', null, 530],
        "\0".parent::class."\0".'logger' => [parent::class, 'logger', null, 530],
        "\0".parent::class."\0".'requestStack' => [parent::class, 'requestStack', null, 530],
        "\0".parent::class."\0".'reverseProxyGateway' => [parent::class, 'reverseProxyGateway', null, 530],
        "\0".parent::class."\0".'softPurge' => [parent::class, 'softPurge', null, 530],
        "\0".parent::class."\0".'tagInvalidationLogEnabled' => [parent::class, 'tagInvalidationLogEnabled', null, 530],
        "\0".parent::class."\0".'useDelayedCache' => [parent::class, 'useDelayedCache', null, 530],
        'adapters' => [parent::class, 'adapters', null, 530],
        'backtraceCollector' => [parent::class, 'backtraceCollector', null, 530],
        'cache' => [parent::class, 'cache', null, 530],
        'dispatcher' => [parent::class, 'dispatcher', null, 530],
        'httpCacheStore' => [parent::class, 'httpCacheStore', null, 530],
        'logger' => [parent::class, 'logger', null, 530],
        'requestStack' => [parent::class, 'requestStack', null, 530],
        'reverseProxyGateway' => [parent::class, 'reverseProxyGateway', null, 530],
        'softPurge' => [parent::class, 'softPurge', null, 530],
        'tagInvalidationLogEnabled' => [parent::class, 'tagInvalidationLogEnabled', null, 530],
        'useDelayedCache' => [parent::class, 'useDelayedCache', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('CacheInvalidatorGhost0edcb5d', false)) {
    \class_alias(__NAMESPACE__.'\\CacheInvalidatorGhost0edcb5d', 'CacheInvalidatorGhost0edcb5d', false);
}

class CommandExecutorGhostCe5b48a extends \Shopware\Core\Framework\Plugin\Composer\CommandExecutor implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'application' => [parent::class, 'application', null, 530],
        "\0".parent::class."\0".'projectDir' => [parent::class, 'projectDir', null, 530],
        'application' => [parent::class, 'application', null, 530],
        'projectDir' => [parent::class, 'projectDir', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('CommandExecutorGhostCe5b48a', false)) {
    \class_alias(__NAMESPACE__.'\\CommandExecutorGhostCe5b48a', 'CommandExecutorGhostCe5b48a', false);
}

class StoreServiceGhostE50361c extends \Shopware\Core\Framework\Store\Services\StoreService implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'userRepository' => [parent::class, 'userRepository', null, 530],
        'userRepository' => [parent::class, 'userRepository', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('StoreServiceGhostE50361c', false)) {
    \class_alias(__NAMESPACE__.'\\StoreServiceGhostE50361c', 'StoreServiceGhostE50361c', false);
}

class MeterGhost54923d6 extends \Shopware\Core\Framework\Telemetry\Metrics\Meter implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'environment' => [parent::class, 'environment', null, 530],
        "\0".parent::class."\0".'logger' => [parent::class, 'logger', null, 530],
        "\0".parent::class."\0".'metricConfigProvider' => [parent::class, 'metricConfigProvider', null, 530],
        "\0".parent::class."\0".'transports' => [parent::class, 'transports', null, 530],
        'environment' => [parent::class, 'environment', null, 530],
        'logger' => [parent::class, 'logger', null, 530],
        'metricConfigProvider' => [parent::class, 'metricConfigProvider', null, 530],
        'transports' => [parent::class, 'transports', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('MeterGhost54923d6', false)) {
    \class_alias(__NAMESPACE__.'\\MeterGhost54923d6', 'MeterGhost54923d6', false);
}

class TransportCollectionProxy84ab7eb extends \Shopware\Core\Framework\Telemetry\Metrics\Transport\TransportCollection implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'transports' => [parent::class, 'transports', null, 530],
        'transports' => [parent::class, 'transports', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TransportCollectionProxy84ab7eb', false)) {
    \class_alias(__NAMESPACE__.'\\TransportCollectionProxy84ab7eb', 'TransportCollectionProxy84ab7eb', false);
}

class HookableEventFactoryGhostDcd2f7a extends \Shopware\Core\Framework\Webhook\Hookable\HookableEventFactory implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'eventEncoder' => [parent::class, 'eventEncoder', null, 530],
        "\0".parent::class."\0".'hookableEventCollector' => [parent::class, 'hookableEventCollector', null, 530],
        "\0".parent::class."\0".'writeResultMerger' => [parent::class, 'writeResultMerger', null, 530],
        'eventEncoder' => [parent::class, 'eventEncoder', null, 530],
        'hookableEventCollector' => [parent::class, 'hookableEventCollector', null, 530],
        'writeResultMerger' => [parent::class, 'writeResultMerger', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('HookableEventFactoryGhostDcd2f7a', false)) {
    \class_alias(__NAMESPACE__.'\\HookableEventFactoryGhostDcd2f7a', 'HookableEventFactoryGhostDcd2f7a', false);
}

class WebhookManagerGhostB0e0fbd extends \Shopware\Core\Framework\Webhook\Service\WebhookManager implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'appLocaleProvider' => [parent::class, 'appLocaleProvider', null, 530],
        "\0".parent::class."\0".'appPayloadServiceHelper' => [parent::class, 'appPayloadServiceHelper', null, 530],
        "\0".parent::class."\0".'bus' => [parent::class, 'bus', null, 530],
        "\0".parent::class."\0".'connection' => [parent::class, 'connection', null, 530],
        "\0".parent::class."\0".'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        "\0".parent::class."\0".'eventFactory' => [parent::class, 'eventFactory', null, 530],
        "\0".parent::class."\0".'guzzle' => [parent::class, 'guzzle', null, 530],
        "\0".parent::class."\0".'isAdminWorkerEnabled' => [parent::class, 'isAdminWorkerEnabled', null, 530],
        "\0".parent::class."\0".'privileges' => [parent::class, 'privileges', null, 16],
        "\0".parent::class."\0".'shopUrl' => [parent::class, 'shopUrl', null, 530],
        "\0".parent::class."\0".'shopwareVersion' => [parent::class, 'shopwareVersion', null, 530],
        "\0".parent::class."\0".'webhookLoader' => [parent::class, 'webhookLoader', null, 530],
        "\0".parent::class."\0".'webhooks' => [parent::class, 'webhooks', null, 16],
        'appLocaleProvider' => [parent::class, 'appLocaleProvider', null, 530],
        'appPayloadServiceHelper' => [parent::class, 'appPayloadServiceHelper', null, 530],
        'bus' => [parent::class, 'bus', null, 530],
        'connection' => [parent::class, 'connection', null, 530],
        'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        'eventFactory' => [parent::class, 'eventFactory', null, 530],
        'guzzle' => [parent::class, 'guzzle', null, 530],
        'isAdminWorkerEnabled' => [parent::class, 'isAdminWorkerEnabled', null, 530],
        'privileges' => [parent::class, 'privileges', null, 16],
        'shopUrl' => [parent::class, 'shopUrl', null, 530],
        'shopwareVersion' => [parent::class, 'shopwareVersion', null, 530],
        'webhookLoader' => [parent::class, 'webhookLoader', null, 530],
        'webhooks' => [parent::class, 'webhooks', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('WebhookManagerGhostB0e0fbd', false)) {
    \class_alias(__NAMESPACE__.'\\WebhookManagerGhostB0e0fbd', 'WebhookManagerGhostB0e0fbd', false);
}

class SnippetFileCollectionProxy685ae73 extends \Shopware\Core\System\Snippet\Files\SnippetFileCollection implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'elements' => [parent::class, 'elements', null, 8],
        "\0".'*'."\0".'extensions' => [parent::class, 'extensions', null, 8],
        "\0".parent::class."\0".'mapping' => [parent::class, 'mapping', null, 16],
        'elements' => [parent::class, 'elements', null, 8],
        'extensions' => [parent::class, 'extensions', null, 8],
        'mapping' => [parent::class, 'mapping', null, 16],
    ];
    public function add($snippetFile): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->add(...\func_get_args());
        } else {
            parent::add(...\func_get_args());
        }
    }
    public function get($key): ?\Shopware\Core\System\Snippet\Files\AbstractSnippetFile
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->get(...\func_get_args());
        }
        return parent::get(...\func_get_args());
    }
    public function set($key, $element): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->set(...\func_get_args());
        } else {
            parent::set(...\func_get_args());
        }
    }
    public function clear(): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->clear(...\func_get_args());
        } else {
            parent::clear(...\func_get_args());
        }
    }
    public function remove($key): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->remove(...\func_get_args());
        } else {
            parent::remove(...\func_get_args());
        }
    }
    public function getByName(string $key): ?\Shopware\Core\System\Snippet\Files\AbstractSnippetFile
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getByName(...\func_get_args());
        }
        return parent::getByName(...\func_get_args());
    }
    public function getFilesArray(bool $isBase = true): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getFilesArray(...\func_get_args());
        }
        return parent::getFilesArray(...\func_get_args());
    }
    public function toArray(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->toArray(...\func_get_args());
        }
        return parent::toArray(...\func_get_args());
    }
    public function getIsoList(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getIsoList(...\func_get_args());
        }
        return parent::getIsoList(...\func_get_args());
    }
    public function getSnippetFilesByIso(string $iso): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getSnippetFilesByIso(...\func_get_args());
        }
        return parent::getSnippetFilesByIso(...\func_get_args());
    }
    public function getBaseFileByIso(string $iso): \Shopware\Core\System\Snippet\Files\AbstractSnippetFile
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getBaseFileByIso(...\func_get_args());
        }
        return parent::getBaseFileByIso(...\func_get_args());
    }
    public function getApiAlias(): string
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getApiAlias(...\func_get_args());
        }
        return parent::getApiAlias(...\func_get_args());
    }
    public function hasFileForPath(string $filePath): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->hasFileForPath(...\func_get_args());
        }
        return parent::hasFileForPath(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function count(): int
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->count(...\func_get_args());
        }
        return parent::count(...\func_get_args());
    }
    public function getKeys(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getKeys(...\func_get_args());
        }
        return parent::getKeys(...\func_get_args());
    }
    public function has($key): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->has(...\func_get_args());
        }
        return parent::has(...\func_get_args());
    }
    public function map(\Closure $closure): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->map(...\func_get_args());
        }
        return parent::map(...\func_get_args());
    }
    public function fmap(\Closure $closure): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->fmap(...\func_get_args());
        }
        return parent::fmap(...\func_get_args());
    }
    public function flatMap(\Closure $closure): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->flatMap(...\func_get_args());
        }
        return parent::flatMap(...\func_get_args());
    }
    public function sort(\Closure $closure): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->sort(...\func_get_args());
        } else {
            parent::sort(...\func_get_args());
        }
    }
    public function getElements(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getElements(...\func_get_args());
        }
        return parent::getElements(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function jsonSerialize(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->jsonSerialize(...\func_get_args());
        }
        return parent::jsonSerialize(...\func_get_args());
    }
    public function addExtension(string $name, \Shopware\Core\Framework\Struct\Struct $extension): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addExtension(...\func_get_args());
        } else {
            parent::addExtension(...\func_get_args());
        }
    }
    public function addArrayExtension(string $name, array $extension): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addArrayExtension(...\func_get_args());
        } else {
            parent::addArrayExtension(...\func_get_args());
        }
    }
    public function addExtensions(array $extensions): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addExtensions(...\func_get_args());
        } else {
            parent::addExtensions(...\func_get_args());
        }
    }
    public function hasExtension(string $name): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->hasExtension(...\func_get_args());
        }
        return parent::hasExtension(...\func_get_args());
    }
    public function hasExtensionOfType(string $name, string $type): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->hasExtensionOfType(...\func_get_args());
        }
        return parent::hasExtensionOfType(...\func_get_args());
    }
    public function getExtensions(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getExtensions(...\func_get_args());
        }
        return parent::getExtensions(...\func_get_args());
    }
    public function setExtensions(array $extensions): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->setExtensions(...\func_get_args());
        } else {
            parent::setExtensions(...\func_get_args());
        }
    }
    public function removeExtension(string $name): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->removeExtension(...\func_get_args());
        } else {
            parent::removeExtension(...\func_get_args());
        }
    }
    public function getVars(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getVars(...\func_get_args());
        }
        return parent::getVars(...\func_get_args());
    }
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SnippetFileCollectionProxy685ae73', false)) {
    \class_alias(__NAMESPACE__.'\\SnippetFileCollectionProxy685ae73', 'SnippetFileCollectionProxy685ae73', false);
}

class SnippetServiceGhost9b4c875 extends \Shopware\Core\System\Snippet\SnippetService implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'connection' => [parent::class, 'connection', null, 530],
        "\0".parent::class."\0".'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        "\0".parent::class."\0".'extensionDispatcher' => [parent::class, 'extensionDispatcher', null, 530],
        "\0".parent::class."\0".'localFileSystem' => [parent::class, 'localFileSystem', null, 530],
        "\0".parent::class."\0".'privateFileSystem' => [parent::class, 'privateFileSystem', null, 530],
        "\0".parent::class."\0".'snippetFileCollection' => [parent::class, 'snippetFileCollection', null, 530],
        "\0".parent::class."\0".'snippetFilterFactory' => [parent::class, 'snippetFilterFactory', null, 530],
        "\0".parent::class."\0".'snippetRepository' => [parent::class, 'snippetRepository', null, 530],
        "\0".parent::class."\0".'snippetSetRepository' => [parent::class, 'snippetSetRepository', null, 530],
        'connection' => [parent::class, 'connection', null, 530],
        'eventDispatcher' => [parent::class, 'eventDispatcher', null, 530],
        'extensionDispatcher' => [parent::class, 'extensionDispatcher', null, 530],
        'localFileSystem' => [parent::class, 'localFileSystem', null, 530],
        'privateFileSystem' => [parent::class, 'privateFileSystem', null, 530],
        'snippetFileCollection' => [parent::class, 'snippetFileCollection', null, 530],
        'snippetFilterFactory' => [parent::class, 'snippetFilterFactory', null, 530],
        'snippetRepository' => [parent::class, 'snippetRepository', null, 530],
        'snippetSetRepository' => [parent::class, 'snippetSetRepository', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SnippetServiceGhost9b4c875', false)) {
    \class_alias(__NAMESPACE__.'\\SnippetServiceGhost9b4c875', 'SnippetServiceGhost9b4c875', false);
}

class TranslationConfigProxyF08c2bf extends \Shopware\Core\System\Snippet\Struct\TranslationConfig implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'*'."\0".'extensions' => [parent::class, 'extensions', null, 8],
        'excludedLocales' => [parent::class, 'excludedLocales', parent::class, 518],
        'extensions' => [parent::class, 'extensions', null, 8],
        'languages' => [parent::class, 'languages', parent::class, 518],
        'locales' => [parent::class, 'locales', parent::class, 518],
        'metadataUrl' => [parent::class, 'metadataUrl', parent::class, 518],
        'pluginMapping' => [parent::class, 'pluginMapping', parent::class, 518],
        'plugins' => [parent::class, 'plugins', parent::class, 518],
        'repositoryUrl' => [parent::class, 'repositoryUrl', parent::class, 518],
    ];
    public function getMappedPluginName(\Shopware\Core\Framework\Plugin $plugin): string
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getMappedPluginName(...\func_get_args());
        }
        return parent::getMappedPluginName(...\func_get_args());
    }
    public function getApiAlias(): string
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getApiAlias(...\func_get_args());
        }
        return parent::getApiAlias(...\func_get_args());
    }
    public function addExtension(string $name, \Shopware\Core\Framework\Struct\Struct $extension): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addExtension(...\func_get_args());
        } else {
            parent::addExtension(...\func_get_args());
        }
    }
    public function addArrayExtension(string $name, array $extension): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addArrayExtension(...\func_get_args());
        } else {
            parent::addArrayExtension(...\func_get_args());
        }
    }
    public function addExtensions(array $extensions): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->addExtensions(...\func_get_args());
        } else {
            parent::addExtensions(...\func_get_args());
        }
    }
    public function hasExtension(string $name): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->hasExtension(...\func_get_args());
        }
        return parent::hasExtension(...\func_get_args());
    }
    public function hasExtensionOfType(string $name, string $type): bool
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->hasExtensionOfType(...\func_get_args());
        }
        return parent::hasExtensionOfType(...\func_get_args());
    }
    public function getExtensions(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getExtensions(...\func_get_args());
        }
        return parent::getExtensions(...\func_get_args());
    }
    public function setExtensions(array $extensions): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->setExtensions(...\func_get_args());
        } else {
            parent::setExtensions(...\func_get_args());
        }
    }
    public function removeExtension(string $name): void
    {
        if (isset($this->lazyObjectState)) {
            ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->removeExtension(...\func_get_args());
        } else {
            parent::removeExtension(...\func_get_args());
        }
    }
    #[\ReturnTypeWillChange] public function jsonSerialize(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->jsonSerialize(...\func_get_args());
        }
        return parent::jsonSerialize(...\func_get_args());
    }
    public function getVars(): array
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getVars(...\func_get_args());
        }
        return parent::getVars(...\func_get_args());
    }
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('TranslationConfigProxyF08c2bf', false)) {
    \class_alias(__NAMESPACE__.'\\TranslationConfigProxyF08c2bf', 'TranslationConfigProxyF08c2bf', false);
}

class SystemConfigServiceGhost3f5cc89 extends \Shopware\Core\System\SystemConfig\SystemConfigService implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'appMapping' => [parent::class, 'appMapping', null, 16],
        "\0".parent::class."\0".'cacheTagCollector' => [parent::class, 'cacheTagCollector', null, 530],
        "\0".parent::class."\0".'configReader' => [parent::class, 'configReader', null, 530],
        "\0".parent::class."\0".'connection' => [parent::class, 'connection', null, 530],
        "\0".parent::class."\0".'dispatcher' => [parent::class, 'dispatcher', null, 530],
        "\0".parent::class."\0".'loader' => [parent::class, 'loader', null, 530],
        "\0".parent::class."\0".'symfonySystemConfigService' => [parent::class, 'symfonySystemConfigService', null, 530],
        'appMapping' => [parent::class, 'appMapping', null, 16],
        'cacheTagCollector' => [parent::class, 'cacheTagCollector', null, 530],
        'configReader' => [parent::class, 'configReader', null, 530],
        'connection' => [parent::class, 'connection', null, 530],
        'dispatcher' => [parent::class, 'dispatcher', null, 530],
        'loader' => [parent::class, 'loader', null, 530],
        'symfonySystemConfigService' => [parent::class, 'symfonySystemConfigService', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SystemConfigServiceGhost3f5cc89', false)) {
    \class_alias(__NAMESPACE__.'\\SystemConfigServiceGhost3f5cc89', 'SystemConfigServiceGhost3f5cc89', false);
}

class EntityDispatchServiceGhost2bf5090 extends \Shopware\Core\System\UsageData\Services\EntityDispatchService implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'appConfig' => [parent::class, 'appConfig', null, 530],
        "\0".parent::class."\0".'collectionEnabled' => [parent::class, 'collectionEnabled', null, 530],
        "\0".parent::class."\0".'consentService' => [parent::class, 'consentService', null, 530],
        "\0".parent::class."\0".'entityDefinitionService' => [parent::class, 'entityDefinitionService', null, 530],
        "\0".parent::class."\0".'gatewayStatusService' => [parent::class, 'gatewayStatusService', null, 530],
        "\0".parent::class."\0".'messageBus' => [parent::class, 'messageBus', null, 530],
        "\0".parent::class."\0".'shopIdProvider' => [parent::class, 'shopIdProvider', null, 530],
        "\0".parent::class."\0".'systemConfigService' => [parent::class, 'systemConfigService', null, 530],
        'appConfig' => [parent::class, 'appConfig', null, 530],
        'collectionEnabled' => [parent::class, 'collectionEnabled', null, 530],
        'consentService' => [parent::class, 'consentService', null, 530],
        'entityDefinitionService' => [parent::class, 'entityDefinitionService', null, 530],
        'gatewayStatusService' => [parent::class, 'gatewayStatusService', null, 530],
        'messageBus' => [parent::class, 'messageBus', null, 530],
        'shopIdProvider' => [parent::class, 'shopIdProvider', null, 530],
        'systemConfigService' => [parent::class, 'systemConfigService', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('EntityDispatchServiceGhost2bf5090', false)) {
    \class_alias(__NAMESPACE__.'\\EntityDispatchServiceGhost2bf5090', 'EntityDispatchServiceGhost2bf5090', false);
}

class ResolvedConfigLoaderGhostD0a06fa extends \Shopware\Storefront\Theme\ResolvedConfigLoader implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'repository' => [parent::class, 'repository', null, 530],
        "\0".parent::class."\0".'runtimeConfigService' => [parent::class, 'runtimeConfigService', null, 530],
        'repository' => [parent::class, 'repository', null, 530],
        'runtimeConfigService' => [parent::class, 'runtimeConfigService', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ResolvedConfigLoaderGhostD0a06fa', false)) {
    \class_alias(__NAMESPACE__.'\\ResolvedConfigLoaderGhostD0a06fa', 'ResolvedConfigLoaderGhostD0a06fa', false);
}

class SeedingThemePathBuilderGhostBbf0456 extends \Shopware\Storefront\Theme\SeedingThemePathBuilder implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'systemConfigService' => [parent::class, 'systemConfigService', null, 530],
        'systemConfigService' => [parent::class, 'systemConfigService', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('SeedingThemePathBuilderGhostBbf0456', false)) {
    \class_alias(__NAMESPACE__.'\\SeedingThemePathBuilderGhostBbf0456', 'SeedingThemePathBuilderGhostBbf0456', false);
}

class ArrayIteratorProxy9d5ac06 extends \ArrayIterator implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [];
    public function __construct(array|object $array = [], int $flags = 0)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->__construct(...\func_get_args());
        }
        return parent::__construct(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function offsetExists(mixed $key)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->offsetExists(...\func_get_args());
        }
        return parent::offsetExists(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function offsetGet(mixed $key)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->offsetGet(...\func_get_args());
        }
        return parent::offsetGet(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function offsetSet(mixed $key, mixed $value)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->offsetSet(...\func_get_args());
        }
        return parent::offsetSet(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function offsetUnset(mixed $key)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->offsetUnset(...\func_get_args());
        }
        return parent::offsetUnset(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function append(mixed $value)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->append(...\func_get_args());
        }
        return parent::append(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function getArrayCopy()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getArrayCopy(...\func_get_args());
        }
        return parent::getArrayCopy(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function count()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->count(...\func_get_args());
        }
        return parent::count(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function getFlags()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getFlags(...\func_get_args());
        }
        return parent::getFlags(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function setFlags(int $flags)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->setFlags(...\func_get_args());
        }
        return parent::setFlags(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function asort(int $flags = \SORT_REGULAR)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->asort(...\func_get_args());
        }
        return parent::asort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function ksort(int $flags = \SORT_REGULAR)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->ksort(...\func_get_args());
        }
        return parent::ksort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function uasort(callable $callback)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->uasort(...\func_get_args());
        }
        return parent::uasort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function uksort(callable $callback)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->uksort(...\func_get_args());
        }
        return parent::uksort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function natsort()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->natsort(...\func_get_args());
        }
        return parent::natsort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function natcasesort()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->natcasesort(...\func_get_args());
        }
        return parent::natcasesort(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function unserialize(string $data)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->unserialize(...\func_get_args());
        }
        return parent::unserialize(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function serialize()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->serialize(...\func_get_args());
        }
        return parent::serialize(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function rewind()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->rewind(...\func_get_args());
        }
        return parent::rewind(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function current()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->current(...\func_get_args());
        }
        return parent::current(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function key()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->key(...\func_get_args());
        }
        return parent::key(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function next()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->next(...\func_get_args());
        }
        return parent::next(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function valid()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->valid(...\func_get_args());
        }
        return parent::valid(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function seek(int $offset)
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->seek(...\func_get_args());
        }
        return parent::seek(...\func_get_args());
    }
    #[\ReturnTypeWillChange] public function __debugInfo()
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->__debugInfo(...\func_get_args());
        }
        return parent::__debugInfo(...\func_get_args());
    }
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ArrayIteratorProxy9d5ac06', false)) {
    \class_alias(__NAMESPACE__.'\\ArrayIteratorProxy9d5ac06', 'ArrayIteratorProxy9d5ac06', false);
}

class RequestPayloadValueResolverGhostA70a604 extends \Symfony\Component\HttpKernel\Controller\ArgumentResolver\RequestPayloadValueResolver implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'serializer' => [parent::class, 'serializer', null, 530],
        "\0".parent::class."\0".'translationDomain' => [parent::class, 'translationDomain', null, 16],
        "\0".parent::class."\0".'translator' => [parent::class, 'translator', null, 530],
        "\0".parent::class."\0".'validator' => [parent::class, 'validator', null, 530],
        'serializer' => [parent::class, 'serializer', null, 530],
        'translationDomain' => [parent::class, 'translationDomain', null, 16],
        'translator' => [parent::class, 'translator', null, 530],
        'validator' => [parent::class, 'validator', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('RequestPayloadValueResolverGhostA70a604', false)) {
    \class_alias(__NAMESPACE__.'\\RequestPayloadValueResolverGhostA70a604', 'RequestPayloadValueResolverGhostA70a604', false);
}

class ClientGhostA5741da extends \GuzzleHttp\Client implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'config' => [parent::class, 'config', null, 16],
        'config' => [parent::class, 'config', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ClientGhostA5741da', false)) {
    \class_alias(__NAMESPACE__.'\\ClientGhostA5741da', 'ClientGhostA5741da', false);
}

class FallbackUrlPackageGhost4654b87 extends \Shopware\Core\Framework\Adapter\Asset\FallbackUrlPackage implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'requestStack' => [parent::class, 'requestStack', null, 530],
        "\0".'Symfony\\Component\\Asset\\Package'."\0".'context' => ['Symfony\\Component\\Asset\\Package', 'context', null, 16],
        "\0".'Symfony\\Component\\Asset\\Package'."\0".'versionStrategy' => ['Symfony\\Component\\Asset\\Package', 'versionStrategy', null, 16],
        "\0".'Symfony\\Component\\Asset\\UrlPackage'."\0".'baseUrls' => ['Symfony\\Component\\Asset\\UrlPackage', 'baseUrls', null, 16],
        "\0".'Symfony\\Component\\Asset\\UrlPackage'."\0".'sslPackage' => ['Symfony\\Component\\Asset\\UrlPackage', 'sslPackage', null, 16],
        'baseUrls' => ['Symfony\\Component\\Asset\\UrlPackage', 'baseUrls', null, 16],
        'context' => ['Symfony\\Component\\Asset\\Package', 'context', null, 16],
        'requestStack' => [parent::class, 'requestStack', null, 530],
        'sslPackage' => ['Symfony\\Component\\Asset\\UrlPackage', 'sslPackage', null, 16],
        'versionStrategy' => ['Symfony\\Component\\Asset\\Package', 'versionStrategy', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('FallbackUrlPackageGhost4654b87', false)) {
    \class_alias(__NAMESPACE__.'\\FallbackUrlPackageGhost4654b87', 'FallbackUrlPackageGhost4654b87', false);
}

class ThemeAssetPackageGhostCd6c9d1 extends \Shopware\Storefront\Theme\ThemeAssetPackage implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".'Shopware\\Core\\Framework\\Adapter\\Asset\\FallbackUrlPackage'."\0".'requestStack' => ['Shopware\\Core\\Framework\\Adapter\\Asset\\FallbackUrlPackage', 'requestStack', null, 530],
        "\0".parent::class."\0".'requestStack' => [parent::class, 'requestStack', null, 530],
        "\0".parent::class."\0".'themePathBuilder' => [parent::class, 'themePathBuilder', null, 530],
        "\0".'Symfony\\Component\\Asset\\Package'."\0".'context' => ['Symfony\\Component\\Asset\\Package', 'context', null, 16],
        "\0".'Symfony\\Component\\Asset\\Package'."\0".'versionStrategy' => ['Symfony\\Component\\Asset\\Package', 'versionStrategy', null, 16],
        "\0".'Symfony\\Component\\Asset\\UrlPackage'."\0".'baseUrls' => ['Symfony\\Component\\Asset\\UrlPackage', 'baseUrls', null, 16],
        "\0".'Symfony\\Component\\Asset\\UrlPackage'."\0".'sslPackage' => ['Symfony\\Component\\Asset\\UrlPackage', 'sslPackage', null, 16],
        'baseUrls' => ['Symfony\\Component\\Asset\\UrlPackage', 'baseUrls', null, 16],
        'context' => ['Symfony\\Component\\Asset\\Package', 'context', null, 16],
        'requestStack' => [parent::class, 'requestStack', null, 530],
        'sslPackage' => ['Symfony\\Component\\Asset\\UrlPackage', 'sslPackage', null, 16],
        'themePathBuilder' => [parent::class, 'themePathBuilder', null, 530],
        'versionStrategy' => ['Symfony\\Component\\Asset\\Package', 'versionStrategy', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ThemeAssetPackageGhostCd6c9d1', false)) {
    \class_alias(__NAMESPACE__.'\\ThemeAssetPackageGhostCd6c9d1', 'ThemeAssetPackageGhostCd6c9d1', false);
}

class MySQLInvalidatorStorageGhost5740e86 extends \Shopware\Core\Framework\Adapter\Cache\InvalidatorStorage\MySQLInvalidatorStorage implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'connection' => [parent::class, 'connection', null, 530],
        "\0".parent::class."\0".'debug' => [parent::class, 'debug', null, 530],
        "\0".parent::class."\0".'logger' => [parent::class, 'logger', null, 530],
        'connection' => [parent::class, 'connection', null, 530],
        'debug' => [parent::class, 'debug', null, 530],
        'logger' => [parent::class, 'logger', null, 530],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('MySQLInvalidatorStorageGhost5740e86', false)) {
    \class_alias(__NAMESPACE__.'\\MySQLInvalidatorStorageGhost5740e86', 'MySQLInvalidatorStorageGhost5740e86', false);
}

class ClientProxyA5741da extends \GuzzleHttp\Client implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyProxyTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'config' => [parent::class, 'config', null, 16],
        'config' => [parent::class, 'config', null, 16],
    ];
    public function sendAsync(\Psr\Http\Message\RequestInterface $request, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->sendAsync(...\func_get_args());
        }
        return parent::sendAsync(...\func_get_args());
    }
    public function send(\Psr\Http\Message\RequestInterface $request, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->send(...\func_get_args());
        }
        return parent::send(...\func_get_args());
    }
    public function sendRequest(\Psr\Http\Message\RequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->sendRequest(...\func_get_args());
        }
        return parent::sendRequest(...\func_get_args());
    }
    public function requestAsync(string $method, $uri = '', array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->requestAsync(...\func_get_args());
        }
        return parent::requestAsync(...\func_get_args());
    }
    public function request(string $method, $uri = '', array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->request(...\func_get_args());
        }
        return parent::request(...\func_get_args());
    }
    public function get($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->get(...\func_get_args());
        }
        return parent::get(...\func_get_args());
    }
    public function head($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->head(...\func_get_args());
        }
        return parent::head(...\func_get_args());
    }
    public function put($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->put(...\func_get_args());
        }
        return parent::put(...\func_get_args());
    }
    public function post($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->post(...\func_get_args());
        }
        return parent::post(...\func_get_args());
    }
    public function patch($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->patch(...\func_get_args());
        }
        return parent::patch(...\func_get_args());
    }
    public function delete($uri, array $options = []): \Psr\Http\Message\ResponseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->delete(...\func_get_args());
        }
        return parent::delete(...\func_get_args());
    }
    public function getAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->getAsync(...\func_get_args());
        }
        return parent::getAsync(...\func_get_args());
    }
    public function headAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->headAsync(...\func_get_args());
        }
        return parent::headAsync(...\func_get_args());
    }
    public function putAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->putAsync(...\func_get_args());
        }
        return parent::putAsync(...\func_get_args());
    }
    public function postAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->postAsync(...\func_get_args());
        }
        return parent::postAsync(...\func_get_args());
    }
    public function patchAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->patchAsync(...\func_get_args());
        }
        return parent::patchAsync(...\func_get_args());
    }
    public function deleteAsync($uri, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        if (isset($this->lazyObjectState)) {
            return ($this->lazyObjectState->realInstance ??= ($this->lazyObjectState->initializer)())->deleteAsync(...\func_get_args());
        }
        return parent::deleteAsync(...\func_get_args());
    }
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('ClientProxyA5741da', false)) {
    \class_alias(__NAMESPACE__.'\\ClientProxyA5741da', 'ClientProxyA5741da', false);
}

class UriSignerGhost0685793 extends \Symfony\Component\HttpFoundation\UriSigner implements \Symfony\Component\VarExporter\LazyObjectInterface
{
    use \Symfony\Component\VarExporter\LazyGhostTrait;
    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'clock' => [parent::class, 'clock', null, 16],
        "\0".parent::class."\0".'expirationParameter' => [parent::class, 'expirationParameter', null, 16],
        "\0".parent::class."\0".'hashParameter' => [parent::class, 'hashParameter', null, 16],
        "\0".parent::class."\0".'secret' => [parent::class, 'secret', null, 16],
        'clock' => [parent::class, 'clock', null, 16],
        'expirationParameter' => [parent::class, 'expirationParameter', null, 16],
        'hashParameter' => [parent::class, 'hashParameter', null, 16],
        'secret' => [parent::class, 'secret', null, 16],
    ];
}
class_exists(\Symfony\Component\VarExporter\Internal\Hydrator::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectRegistry::class);
class_exists(\Symfony\Component\VarExporter\Internal\LazyObjectState::class);

if (!\class_exists('UriSignerGhost0685793', false)) {
    \class_alias(__NAMESPACE__.'\\UriSignerGhost0685793', 'UriSignerGhost0685793', false);
}
