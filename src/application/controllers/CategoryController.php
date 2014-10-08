<?php 

class CategoryController extends Zend_Controller_Action
{
    public function categorysAction()
    {
        $categoryApi = new Service_Category;
        $this->view->categorys = $categoryApi->getList();
    }
}