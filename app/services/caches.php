<?php
$di->set('cache', function() use ($config){


    //Cache data for one day by default
    $backCache = new \Phalcon\Cache\Frontend\Data(array(
        "lifetime" => 86400
    ));

    //Create the Cache setting memcached connection options
//    $cache = new Phalcon\Cache\Backend\Memcache($backCache, array(
//        'host' => 'localhost',
//        'port' => 11211,
//        'persistent' => false
//    ));

    $cache = new \Phalcon\Cache\Backend\Memory($backCache);

    return $cache;
});

//Set the views cache service
$di->set('viewCache', function() use ($config){

    //Cache data for one day by default
    $frontCache = new Phalcon\Cache\Frontend\Output(array(
        "lifetime" => 2592000
    ));

    //File backend settings
    $cache = new Phalcon\Cache\Backend\File($frontCache, array(
        "cacheDir" => $config->application->cacheDir,
        "prefix" => "view"
    ));

    return $cache;
});

$di->set('redis', function() use ($config){
    
    $frontend = new \Phalcon\Cache\Frontend\Data(array(
        "lifetime" => 86400
    ));
    
    $redis = new \Redis();
    $redis->connect('127.0.0.1',6379);
    
    $redisCache = new \Phalcon\Cache\Backend\Redis($frontend, array(
        'redis' => $redis
    ));
    
    return $redisCache;
    
});