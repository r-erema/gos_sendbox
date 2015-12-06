<?php
spl_autoload_register(function ($class) {
	$root = '/home/gutsout/h/gos_sendbox/htdocs/';
	$pathToClass = str_replace('\\', '/', $class) . '.php';
	require_once $root . $pathToClass;
});

use learning\patterns\patterns\composition_and_inheritance\classes\wrong as wrong;
use learning\patterns\patterns\composition_and_inheritance\classes\wright as wright;

echo "=========Неверная реализация===============" . PHP_EOL;
$lecture = new wrong\Lecture(5, wrong\Lesson::FIXED);
print "{$lecture->cost()} ({$lecture->chargeType()})\n";
$seminar = new wrong\Seminar(3, wrong\Seminar::TIMED);
print "{$seminar->cost()} ({$seminar->chargeType()})\n";

echo "=========Верная реализация===============" . PHP_EOL;

/**
 * @var $lessons wright\Lesson[]
 */
$lessons[] = new wright\Seminar(4, new wright\TimedCostStrategy());
$lessons[] = new wright\Lecture(4, new wright\FixedCostStrategy());

foreach ($lessons as $lesson) {
	print "Оплата за занятие {$lesson->cost()}." . PHP_EOL;
	print "Тип оплаты: {$lesson->chargeType()}." . PHP_EOL;
}