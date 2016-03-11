<?php

namespace woo\command;
use woo\controller\Request;

/**
 * Class Command
 * @package woo\command
 */
abstract class Command {

    final public function __construct() {}

    /**
     * @param $request
     */
    public function execute(Request $request) {
        $this->doExecute($request);
    }

    abstract public function doExecute(Request $request);

}