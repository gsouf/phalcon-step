<?php

namespace PhalconStep\Device;


class SessionSelector extends AbstractSelector{

    const SESSION_MOBILE_KEY = "usemobilesite";

    public function has(){
        return $this->di->get("session")
            ->has(self::SESSION_MOBILE_KEY);
    }

    public function get()
    {
        $session=$this->di->get("session");

        /* @var $device \PhalconStep\Service\Device */

        if(!$session->has(self::SESSION_MOBILE_KEY)){
            $this->set($device->getDeviceType());
        }

        return $this->di->get("session")->get(self::SESSION_MOBILE_KEY);

    }

    public function set($type){
        $session=$this->di->get("session");
        $session->set(self::SESSION_MOBILE_KEY,$type);
    }



}