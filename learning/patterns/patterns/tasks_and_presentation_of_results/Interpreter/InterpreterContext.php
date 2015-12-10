<?php

namespace Interpreter;

class InterpreterContext {

    private $expressionStore = [];

    public function replace(Expression $expression, $value) {
        $this->expressionStore[$expression->getKey()] = $value;
    }

    public function lookUp(Expression $expression) {
        return $this->expressionStore[$expression->getKey()];
    }

}