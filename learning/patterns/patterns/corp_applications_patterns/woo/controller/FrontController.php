<?php

namespace woo\controller;

use woo\base\ApplicationRegistry;

/**
 * Class FrontController
 * @package woo\controller
 */
class FrontController {

    public function handleRequest() {
        $request = ApplicationRegistry::getRequest();
        $appC = ApplicationRegistry::appController();

        while ($cmd = $appC->getCommand($request)) {
            $cmd->execute($request);
        }

    }

    /**
     * @param $target
     */
    public function invokeView($target) {
        include "woo/view/{$target}.php";
        exit;
    }

}