<?php

class Plugin_Test extends Zend_Controller_Plugin_Abstract
{
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {
        if($request->getActionName() == 'index') {
            echo '<p>Action index d�tect�e</p>';
        }
    }
}