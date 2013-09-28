<?php
/**
 * Register the flash service with custom CSS classes
 */
$di->set('flash', function(){
    $flash = new Phalcon\Flash\Session();
    return $flash;
});