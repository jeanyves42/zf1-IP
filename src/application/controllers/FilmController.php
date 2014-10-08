<?php

class FilmController extends Zend_Controller_Action
{
    public function filmsAction()
    {
        $filmApi = new Service_Film;
        $this->view->films = $filmApi->getList(null, 'title ASC', 10);
    }
    
    public function filmAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmid');
        $filmApi = new Service_Film;
        $this->view->film = $filmApi->read($filmId);
        if(!$this->view->film) {
            throw new Zend_Controller_Action_Exception('Film inexistant', 404);
        }
    }
    
    public function deleteAction()
    {
        $filmId = (int) $this->getRequest()->getParam('filmid');
        $filmApi = new Service_Film;
        $filmApi->delete($filmId);
        // on redirige vers index après l'action de delete
        $this->_redirect('/');
    }
}
