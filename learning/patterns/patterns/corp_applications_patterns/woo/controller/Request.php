<?php

namespace woo\controller;

/**
 * Class Request
 * @package woo\controller
 */
class Request {

    /**
     * @param $cmd
     * @return mixed
     */
    public function getProperty($cmd) {
        return $cmd;
    }

    /**
     * @param $message
     */
    public function addFeedback($message) {

    }
}