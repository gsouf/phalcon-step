<?php

namespace Controllers;

/**
 *
 * @author sghzal
 */
class SpecialController extends ControllerBase {

    public function redirectAction(){
        $where = $this->dispatcher->getParam("where");
        $type  = $this->dispatcher->getParam("type");
        return $this->response->redirect($where, null, $type);
    }
    
    public function nullAction(){
        $this->view->disable();
    }
    
    
}