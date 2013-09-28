<?php
use Phalcon\Mvc\Url;
/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function() use ($config) {
    $url = new Url();
    $url->setBaseUri($config->application->baseUri);
    return $url;
}, true);
