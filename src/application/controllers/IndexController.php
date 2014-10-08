<?php 

class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
            $filmApi = new Service_Film;
            $this->view->film1 = $filmApi->read(1);
            $this->view->films = $filmApi->getList(null, 'title ASC', 20);
        
    }
}