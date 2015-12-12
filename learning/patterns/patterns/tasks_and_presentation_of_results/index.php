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
$newVar = new \Interpreter\VariableExpression('input');
print $context->lookUp($newVar) . PHP_EOL;
$myVar->setVal('Пять');
$myVar->interpret($context);
print $context->lookUp($myVar) . PHP_EOL;
$context = new \Interpreter\InterpreterContext();
$input = new \Interpreter\VariableExpression('input');
$statement = new \Interpreter\BooleanOrExpression(
    new \Interpreter\EqualsExpression($input, new \Interpreter\LiteralExpression('Четыре')),
    new \Interpreter\EqualsExpression($input, new \Interpreter\LiteralExpression(4))
);
foreach (['Четыре', 4, 52] as $value) {
    $input->setVal($value);
    print $value . PHP_EOL;
    $statement->interpret($context);
    if ($context->lookUp($statement)) {
        print "Соответсвует " . PHP_EOL;
    } else {
        print "Не соответсвует " . PHP_EOL;
    }
}

echo PHP_EOL . "-------------------Strategy-------------" . PHP_EOL;
$markers = [
    new \Strategy\RegexpMarker('/П.ть/'),
    new \Strategy\MatchMarker('Пять'),
    new \Strategy\MarkLogicMarker('$inputs equals 5')
];

foreach ($markers as $marker) {
    print get_class($marker) . PHP_EOL;
    $question = new \Strategy\TextQuestion('Сколько лучей у Кремлевской звезды?', $marker);
    foreach (['Пять', 'Четыре'] as $response) {
        print "Response: ";
        if ($question->mark($response)) {
            print 'Правильно' . PHP_EOL;
        } else {
            print 'Неверно' . PHP_EOL;
        }
    }
}

