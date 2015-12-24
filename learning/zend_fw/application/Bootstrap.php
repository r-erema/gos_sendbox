<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{

    protected function _initView() {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->headTitle('My first Zend Framework Application');

        $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setView($view);

        return $view;
    }

}