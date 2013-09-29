<?php

$di->setShared('device',function() use ($di){
    return new PhalconStep\Service\Device(new PhalconStep\Device\SessionSelector($di));
});