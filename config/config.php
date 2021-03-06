<?php

use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;
use Zend\ConfigAggregator\PhpFileProvider;

// To enable or disable caching, set the `ConfigAggregator::ENABLE_CACHE` boolean in
// `config/autoload/local.php`.
$cacheConfig = [
    'config_cache_path' => 'data/config-cache.php',
];

$aggregator = new ConfigAggregator([
    //\Zend\Session\ConfigProvider::class,
    \Zend\Cache\ConfigProvider::class,
    \Zend\I18n\ConfigProvider::class,
    \rollun\actionrender\ConfigProvider::class,
    \rollun\Crud\ConfigProvider::class,
    \rollun\webUI\ConfigProvider::class,
    \rollun\logger\ConfigProvider::class,
    \rollun\datastore\ConfigProvider::class,
    \Zend\Validator\ConfigProvider::class,
    \Zend\Log\ConfigProvider::class,
    \Zend\Db\ConfigProvider::class,
    Zend\Expressive\ConfigProvider::class,
    Zend\Expressive\Router\ConfigProvider::class,
    // Include cache configuration
    new ArrayProvider($cacheConfig),
    // Load application config in a pre-defined order in such a way that local settings
    // overwrite global settings. (Loaded as first to last):
    //   - `global.php`
    //   - `*.global.php`
    //   - `local.php`
    //   - `*.local.php`
    new PhpFileProvider(realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php'),

    // Load development config if it exists
    new PhpFileProvider(realpath(__DIR__) . '/development.config.php'),
], $cacheConfig['config_cache_path']);

return $aggregator->getMergedConfig();
