<?php

namespace Interpreter;

class VariableExpression extends Expression {

    private $name;
    private $val;

    /**
     * VariableExpression constructor.
     * @param $name
     * @param $val
     */
    public function __construct($name, $val = null) {
        $this->name = $name;
        $this->val = $val;
    }

    public function interpret(InterpreterContext $context) {
        if (!is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }

    /**
     * @param mixed $val
     */
    public function setVal($val) {
        $this->val = $val;
    }

    /**
     * @return mixed
     */
    public function getKey() {
        return $this->name;
    }


}