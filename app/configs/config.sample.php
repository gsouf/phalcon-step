<?php

// Convenient for fixing php5.4 encoding in htmlentities & co
define("DEFAULT_ENCODING" , "UTF-8");

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => '',
        'username'    => '',
        'dbname'      => '',
        'password'    => ''
    ),
    'application' => array(
        // paths
        'controllersDir' => ROOT_PATH.'/app/controllers/',
        'viewsDir'       => ROOT_PATH.'/app/views/',
        'pluginsDir'     => ROOT_PATH.'/app/plugins/',
        'servicesDir'    => ROOT_PATH.'/app/services/',
        'cacheDir'       => ROOT_PATH.'/app/cache/',
        'locales'        => ROOT_PATH.'/app/messages/',
        'baseUri'        => '/',
        // configs
    ),
    'device'  => array(
        "allowMobileTheme"     => true,
        "allowDesktopTheme"    => true,
        "deviceTypeSelector"   => 'PhalconStep\Device\SessionSelector'
    )
));

