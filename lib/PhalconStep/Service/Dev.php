<?php

namespace PhalconStep\Service;

use Phalcon\DI\Injectable;

class Dev extends Injectable{

    protected $_startTime=null;
    protected $_enableViewCache=false;
    
    public function start(){
        $this->_startTime=microtime(true);
    }

    public function getRunningTime(){
        return microtime(true)-$this->_startTime;
    }

    public static function getMemoryPeak(){
        return memory_get_peak_usage();
    }

    /**
     * say or set whether the view cache is enabled
     * @param null $enable
     * @return null
     */
    public function enableViewCache($enable=null){
        if(null !== $enable)
            $this->_enableViewCache = $enable;

        return  $this->_enableViewCache;
    }

}