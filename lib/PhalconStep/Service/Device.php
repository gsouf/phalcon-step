<?php


namespace PhalconStep\Service;
use \Phalcon\DI\InjectionAwareInterface as DiInterface;
use PhalconStep\Device\AbstractSelector;

/**
 * Service for mobile/desktop
 *
 * @author sghzal
 */
class Device implements DiInterface  {
    
    protected $_mobileDetect=null;
    
    protected $_deviceType=null;


    /**
     * @var AbstractSelector
     */
    protected $_deviceSelector;
    
    const DEVICE_MOBILE=1;
    const DEVICE_TABLET=2;
    const DEVICE_COMPUTER=3;

    public function __construct($deviceSelector){
        $this->_deviceSelector = $deviceSelector;
    }

    
    /**
     * true if isTablet or isMobile
     * @param $application boolean true if want the type used by the application
     * @return boolean
     */
    public function isNomad($application=false){
        return $this->isMobile($application) || $this->isTabet($application);
    }

    /**
     * true if device is a mobile
     * @param $application boolean true if want the type used by the application
     * @return boolean
     */
    public function isMobile($application=false){
        if($application)
            return $this->getApplicationDeviceType() == self::DEVICE_MOBILE;
        return $this->getDeviceType() == self::DEVICE_MOBILE;
    }
    
    /**
     * true is device is a tablet
     * @param $application boolean true if want the type used by the application
     * @return boolean
     */
    public function isTabet($application=false){
        if($application)
            return $this->getApplicationDeviceType() == self::DEVICE_TABLET;
        return $this->getDeviceType() == self::DEVICE_TABLET;
    }
    
    /**
     * true is device is computer
     * @param $application boolean true if want the type used by the application
     * @return boolean
     */
    public function isComputer($application=false){
        if($application)
            return $this->getApplicationDeviceType() == self::DEVICE_COMPUTER;
        return $this->getDeviceType() == self::DEVICE_COMPUTER;
    }
    
    /**
     * get the type of device (computer, table or mobile)
     * (use getApplicationDeviceType to get the device type that the application should use)
     * @return int this value is identifiable with DEVICE_MOBILE or DEVICE_TABLET or DEVICE_COMPUTER constant
     */
    public function getDeviceType(){
        $md=$this->getMobileDetect();
        if($md == null){
            $this->_deviceType =$md->isMobile() ? self::DEVICE_MOBILE
                : (
                    $md->isTablet()
                  ? self::DEVICE_TABLET   
                  : self::DEVICE_COMPUTER   
                )
            ;
        }
        return $this->_deviceType;
    }

    /**
     * get the device type that should be used by the application
     * (it's not necessary the true device type that is returned by getDeviceType)
     * @return int the device : DEVICE_MOBILE or DEVICE_TABLET or DEVICE_COMPUTER constant
     */
    public function getApplicationDeviceType(){
        if($this->_deviceSelector->has())
            return $this->_deviceSelector->get();

        return $this->getDeviceType();
    }

    /**
     * force a device type for the application
     * @param $type int constant device type
     */
    public function setApplicationDeviceType($type){
        $this->_deviceSelector->set($type);
    }
    
    /**
     * @return \Mobile_Detect
     */
    public function getMobileDetect(){
        if(!$this->_mobileDetect)
            $this->_mobileDetect = new \Mobile_Detect();
        
        return $this->_mobileDetect;
    }
    
    
    // FROM DI INTERFACE
    protected $di;

    public function getDI() {
        return $this->di;
    }

    public function setDI($dependencyInjector) {
        $this->di=$dependencyInjector;
    }

    
}