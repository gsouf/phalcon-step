<?php

// Define application environment
// Change 'development' to 'production' once the application is up and running on the production site
define('ROOT_PATH', __DIR__ . "/.." );

define("ENV_DEV","development");

// Define application environment
// Change 'development' to 'production' once the application is up and running on the production site
define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : ENV_DEV));

/**
 * Read the configuration
 */
$config = include ROOT_PATH . "/app/configs/config.php";

/**
 * Read auto-loader
 */
include ROOT_PATH . "/vendor/autoload.php";


/**
 * Read services
 */
$di = include ROOT_PATH . "/app/configs/services.php";

/**
 * load the config into the DI
 */
$di->set('config', $config);


/**
 * Handle the request
 */
$application = new \Phalcon\Mvc\Application();
$application->setDI($di);

echo $application->handle()->getContent();
// exception/404 managed from the dispatcher event