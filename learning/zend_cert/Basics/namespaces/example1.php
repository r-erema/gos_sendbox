<?php
class ClassName {
    /**
     * ClassName constructor.
     */
    public function __construct() {
        echo __METHOD__ . PHP_EOL;
    }
}

function funcName() {
    echo __FUNCTION__ . PHP_EOL;
}

const CONST_NAME = 'global';