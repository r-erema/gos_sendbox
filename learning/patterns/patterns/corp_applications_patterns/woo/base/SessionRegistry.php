<?php

namespace woo\base;

class SessionRegistry extends Registry{

    /**
     * @var self
     */
    private static $instance = null;

    /**
     * SessionRegistry constructor.
     */
    private function __construct() {
        session_start();
    }

    /**
     * @return null|SessionRegistry
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return null|mixed
     */
    protected function get($key) {
        if (isset($_SESSION[__CLASS__][$key])) {
            return $_SESSION[__CLASS__][$key];
        }
        return null;
    }

    /**
     * @param $key
     * @param $value
     */
    protected function set($key, $value) {
        $_SESSION[__CLASS__][$key] = $value;
    }

    /**
     * @param $dsn
     */
    public function setDSN($dsn) {
        self::$instance->set('dsn', $dsn);
    }

    /**
     * @return mixed|null
     */
    public function getDSN() {
        return self::instance()->get('dsn');
    }

}