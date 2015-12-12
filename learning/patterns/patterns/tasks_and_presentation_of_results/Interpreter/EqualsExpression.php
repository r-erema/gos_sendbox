<?php

namespace Interpreter;

class EqualsExpression extends OperatorExpression {

    protected function doInterpret(InterpreterContext $context, $result_l, $result_r) {
        $context->replace($this, $result_l == $result_r);
    }

}