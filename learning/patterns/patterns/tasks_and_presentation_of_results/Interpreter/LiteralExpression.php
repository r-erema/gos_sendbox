<?php

namespace Interpreter;

class LiteralExpression extends Expression{

    private $value;

    /**
     * LiteralExpression constructor.
     * @param $value
     */
    public function __construct($value) {
        $this->value = $value;
    }

    /**
     * @param InterpreterContext $context
     */
    public function interpret(InterpreterContext $context) {
        $context->replace($this, $this->value);
    }


}