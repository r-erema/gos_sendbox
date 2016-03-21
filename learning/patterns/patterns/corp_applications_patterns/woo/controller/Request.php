<?php

namespace woo\controller;
use woo\command\Command;

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

    public function setProperty($cmd, $s) {
        
    }

    /**
     * @param $message
     */
    public function addFeedback($message) {

    }

    /**
     * @return Command
     */
    public function getLastCommand() {
        
    }

    public function setCommand(Command $cmd) {
        
    }

    public function setObject($name, $object) {
        
    }

}