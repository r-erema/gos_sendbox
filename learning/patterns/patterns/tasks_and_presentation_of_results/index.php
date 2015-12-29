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

echo PHP_EOL . "-------------------Observer-------------" . PHP_EOL;
//$login = new \Observer\Login();
$login = new Observer\bySPL\Login();
new \Observer\SecurityMonitor($login);
/*new \Observer\GeneralLogger($login);
new \Observer\PartnershipTool($login);*/
$login->handleLogin('Vasya', 123, '192.168.0.1');

echo PHP_EOL . "-------------------Visitor-------------" . PHP_EOL;
$mainArmy = new \Visitor\Army();
$mainArmy->addUnit(new \Visitor\Archer());
$mainArmy->addUnit(new \Visitor\LaserCannonUnit());
$mainArmy->addUnit(new \Visitor\Cavalry());
$mainArmy->addUnit(new \Visitor\TroopCarrierUnit());
$textDump = new \Visitor\TextDumpArmyVisitor();
$mainArmy->accept($textDump);
$taxCollector = new \Visitor\TaxCollectionVisitor();
$mainArmy->accept($taxCollector);
print $textDump->getText() . PHP_EOL;
print $taxCollector->getReport() . PHP_EOL;
print "Итого: " . $taxCollector->getDue() . PHP_EOL;


echo PHP_EOL . "-------------------Command-------------" . PHP_EOL;
$controller = new \Command\Controller();
$context = $controller->getContext();
$context->addParam('action', 'login');
$context->addParam('userName', 'Bob');
$context->addParam('pass', 'sdpof');
var_dump($controller->process());

$context->addParam('action', 'feedback');
$context->addParam('userName', 'Bob');
$context->addParam('pass', 'sdpof');
var_dump($controller->process());