<?php

namespace Controllers;

use Phalcon\Mvc\Controller;

class ErrorController extends ControllerBase {
    
    public function notFoundAction(){
        $this->response->setStatusCode("404", "Not Found");
    }
    
}