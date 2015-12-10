<?php
spl_autoload_register(function ($class) {
    require_once '/home/gutsout/h/gos_sendbox/htdocs/learning/patterns/patterns/tasks_and_presentation_of_results/' . str_replace('\\', '/', $class) . '.php';
});

echo PHP_EOL . "-------------------Interpreter-------------" . PHP_EOL;
$context = new \Interpreter\InterpreterContext();
$literal = new \Interpreter\LiteralExpression('Четыре');
$literal->interpret($context);
print $context->lookUp($literal) . PHP_EOL;
$context = new \Interpreter\InterpreterContext();
$myVar = new \Interpreter\VariableExpression('input', 'Четыре');
$myVar->interpret($context);
print $context->lookUp($myVar) . PHP_EOL;
$context = new \Interpreter\InterpreterContext();
$newVar = new \Interpreter\VariableExpression('input');
print $context->lookUp($newVar) . PHP_EOL;
//$myVar->setVal('Пять');
//$myVar->interpret($context);
// print $context->lookUp($myVar) . PHP_EOL;
