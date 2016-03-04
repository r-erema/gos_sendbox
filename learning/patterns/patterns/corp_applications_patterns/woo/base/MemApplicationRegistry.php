<?php

namespace woo\base;

class MemApplicationRegistry extends Registry{

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var
     */
    private $id;

    /**
     * MemApplicationRegistry constructor.
     */
    public function __construct() {}

    /**
     * @return MemApplicationRegistry
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return mixed
     */
    protected function get($key) {
        return apc_fetch($key);
    }

    /**
     * @param $key
     * @param $value
     */
    protected function set($key, $value) {
        return apc_store($key, $value);
    }

    /**
     * @return mixed
     */
    public static function getDSN() {
        return self::$instance->get('dsn');
    }

    /**
     * @param $dsn
     * @return array|bool|mixed
     */
    public static function setDSN($dsn) {
        return self::$instance->set('dsn', $dsn);
    }

}