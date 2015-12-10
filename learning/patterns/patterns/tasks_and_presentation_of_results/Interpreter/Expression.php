<?php

namespace Interpreter;

abstract class Expression {

    private static $keyCount = 0;
    private $key;

    abstract function interpret(InterpreterContext $context);

    public function getKey() {
        if (!isset($this->key)) {
            self::$keyCount++;
            $this->key = self::$keyCount;
        }
        return $this->key;
    }

}