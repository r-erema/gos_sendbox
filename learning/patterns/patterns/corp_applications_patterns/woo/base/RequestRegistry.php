<?php

namespace woo\base;

/**
 * Class RequestRegistry
 * @package woo\base
 */
class RequestRegistry extends Registry{

    private $values = [];
    private static $instance = null;

    /**
     * @return null|RequestRegistry
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return null
     */
    protected function get($key) {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key];
        }
        return null;
    }

    /**
     * @param $key
     * @param $value
     */
    protected function set($key, $value) {
        $this->values[$key] = $value;
    }

    public static function getRequest() {
        $inst = self::instance();
        if ($inst->get('request') === null) {
            $inst->set('request', new \woo\controller\Request());
        }
    }
}