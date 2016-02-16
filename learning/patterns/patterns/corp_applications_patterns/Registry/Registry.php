<?php

namespace Registry;

class Registry {

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var
     */
    private static $testMode;

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var Request;
     */
    private $request;

    /**
     * @var TreeBuilder
     */
    private $treeBuilder;

    /**
     * @var Conf
     */
    private $conf;

    private function __construct() {}

    public static function testMode($mode = true) {
        self::$instance = null;
        self::$testMode = $mode;
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            if (self::$testMode) {
                self::$instance = new MockRegistry();
            } else {
                self::$instance = new self();
            }
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

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value) {
        $this->values[$key] = $value;
    }

    /**
     * @param $key
     * @return null
     */
    public function get($key) {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    public function treeBuilder() {
        if (is_null($this->treeBuilder)) {
            $this->treeBuilder = new TreeBuilder();
        }
        return $this->treeBuilder();
    }

    public function conf() {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }
        return $this->conf;
    }
}