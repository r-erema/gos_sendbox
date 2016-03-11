<?php

namespace woo\controller;

use woo\base\ApplicationRegistry;
use woo\command\CommandResolver;

class Controller {

    private $applicationHelper;

    /**
     * Controller constructor.
     */
    public function __construct() {}

    public static function run() {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }


    /**
     * @return void
     */
    public function init() {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
    }

    /**
     * @return void
     */
    public function handleRequest() {
        $request = ApplicationRegistry::getRequest();
        $cmd_r = new CommandResolver();
        $cmd = $cmd_r->getCommand($request);
        $cmd->execute($request);
    }

}