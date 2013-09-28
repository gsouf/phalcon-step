<?php

use Phalcon\Mvc\Dispatcher\Exception as DispatchException;

$di->set('router', function() use ($config){

    $router = new \Phalcon\Mvc\Router(false);

    include ROOT_PATH . "/app/router.php";

    return $router;

});
