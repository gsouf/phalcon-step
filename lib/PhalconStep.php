<?php

class PhalconStep {

    public static function isDevEnvironment(){
        return ENV_DEV === APPLICATION_ENV;
    }

}