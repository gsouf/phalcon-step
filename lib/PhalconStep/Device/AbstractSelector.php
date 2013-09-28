<?php

namespace PhalconStep\Device;

abstract class AbstractSelector {

    /**
     * Phalcon\DI
     */
    protected $di;

    public function __construct($di){
        $this->di=$di;
    }

    /**
     * get device type
     * @param $di
     * @return mixed
     */
    abstract function get();

    /**
     * check if a device type is registered
     * @return mixed
     */
    abstract function has();

    /**
     * register the device type
     * @param $type
     * @return mixed
     */
    abstract function set($type);


}