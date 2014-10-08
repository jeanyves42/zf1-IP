<?php

class ErrorController extends Zend_Controller_Action
{
	public function errorAction()
	{
	   $errorHandler = $this->getParam('error_handler');
	   $exception = $errorHandler->exception;
	   if($exception->getCode() == 404) {
	       $this->getResponse()->setHttpResponseCode(404);
	   }
	   $this->view->message = $exception->getMessage();
	   $this->view->code = $exception->getCode();
	}
}