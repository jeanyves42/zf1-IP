<?php 

class ActorController extends Zend_Controller_Action
{
    public function actorsAction()
    {
        $actorApi = new Service_Actor;
        $this->view->actors = $actorApi->getList(null, null, 10);
    }
    
    public function actorAction()
    {
        $actorId = (int) $this->getRequest()->getParam('actorid');
        $actorApi = new Service_Actor;
        $this->view->actor = $actorApi->read($actorId);
        if(!$this->view->actor) {
            throw new Zend_Controller_Action_Exception('Acteur inexistant', 404);
        }
    }
}