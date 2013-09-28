<?php

/* @ var $config \Phalcon\Config\ */

use Phalcon\DI\FactoryDefault,
    Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new \Phalcon\DI();

/**
 * Set the data cache service*
*/


// load the caching service
include ROOT_PATH."/app/services/caches.php";

// load the session service
include ROOT_PATH . "/app/services/session.php";

// load the view services
include ROOT_PATH . "/app/services/view.php";

// load the url service
include ROOT_PATH . "/app/services/url.php";

// load the db service
include ROOT_PATH . "/app/services/db.php";

// load the flash service
include ROOT_PATH . "/app/services/flash.php";

// load the response service
include ROOT_PATH . "/app/services/response.php";

// load the dispatcher service
include ROOT_PATH . "/app/services/dispatcher.php";

// load the routes
include ROOT_PATH . "/app/services/router.php";

// load the device service
include ROOT_PATH . "/app/services/device.php";

return $di;