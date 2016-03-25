<?php

namespace gofw;

/**
 * Class Registry
 * @package gofw
 */

class Registry {

    /**
     * @var self
     */
    private static $instance;

    private $container = [];

    /**
     * Registry constructor.
     */
    private function __construct() {}

    /**
     * @return Registry
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @param $value
     * @throws RegistryException
     */
    protected function set($key, $value) {
        if (array_key_exists($key, $this->container)) {
            throw new RegistryException("Key '{$key}' is already use");
        }
        $this->container[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    protected function get($key) {
        if (isset($this->container[$key])) {
            return $this->container[$key];
        }
        return null;
    }

    /**
     * @param $key
     * @return bool
     */
    final public function isEmpty($key) {
        return !isset($this->container[$key]);
    }

    /**
     * @param $key
     */
    final public function clear($key) {
        unset($this->container[$key]);
    }

}