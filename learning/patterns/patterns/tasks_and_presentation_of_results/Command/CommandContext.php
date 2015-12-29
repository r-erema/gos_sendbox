<?php

namespace Command;

class CommandContext {

    /**
     * @var String
     */
    private $error;

    /**
     * @var array
     */
    private $params = array();

    /**
     * CommandContext constructor.
     */
    public function __construct() {
        $this->params = $_REQUEST;
    }

    /**
     * @param $paramId
     * @return mixed
     */
    public function get($paramId) {
        return isset($this->params[$paramId]) ? $this->params[$paramId] : null;
    }

    /**
     * @param String $error
     */
    public function setError($error) {
        $this->error = $error;
    }

    /**
     * @param $paramId
     * @param $param
     */
    public function addParam($paramId, $param) {
        $this->params[$paramId] = $param;
    }
}