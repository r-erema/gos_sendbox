<?php

class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        $exception = $errors->exception;
        $log = new Zend_Log(
            new Zend_Log_Writer_Stream(
                '/tmp/applicationException.log'
            )
        );
        $log->debug($exception->getMessage() . "\n" .
            $exception->getTraceAsString());
    }
}