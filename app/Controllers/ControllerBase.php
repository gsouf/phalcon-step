<?php


namespace Controllers;

/**
 * Base controller for all controllers
 *
 * @author sghzal
 */
class ControllerBase extends \Phalcon\Mvc\Controller {

    public function notFound(){
        $this->dispatcher->forward(array('controller' => 'error', 'action' => 'notFound'));
    }
    
    public function needHttps(){
        if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
            $this->response->redirect('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],true,301)->send();
        }
    }

    
}
