<?php

namespace woo\controller;

use woo\base\ApplicationRegistry;

abstract class PageController {

    abstract public function process();

    /**
     * @param $resource
     */
    public function forward($resource) {
        include $resource;
        exit(0);
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return ApplicationRegistry::getRequest();
    }

}

