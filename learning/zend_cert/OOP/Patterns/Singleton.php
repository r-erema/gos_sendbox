<?php

class DB {
    private static $_singleton;
    private $_connection;

    private function __construct($dsn) {
        $this->_connection = new PDO($dsn);
    }

    public static function getInstance() {
        if (self::$_singleton === null) {
            self::$_singleton = new self();
        }
        return self::$_singleton;
    }
}

$db = DB::getInstance($dsn);