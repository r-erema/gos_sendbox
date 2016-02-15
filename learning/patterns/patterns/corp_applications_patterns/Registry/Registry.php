<?php

namespace Registry;

class Registry {

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var Request;
     */
    private $request;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return Request
     */
    public function getRequest() {
/*        if (is_null($this->request)) {
            return new Request();
        }*/
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request) {
        $this->request = $request;
    }

}