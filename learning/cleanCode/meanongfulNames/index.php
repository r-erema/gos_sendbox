<?php

spl_autoload_register(function ($className) {
	$className = explode('\\', $className);
	require_once "SapperGame/{$className[count($className) - 1]}.php";
});

var_dump((new SapperGame\Sapper())->getFlaggedCells());


//Имена удобные для поиска
//Плохо
$t = [];
for($i = 0; $i < 34; $i++) {
	$t[] = rand(-100, 100);
}
$s = 0;
for ($j = 0; $j < 34; $j++) {
	$s += ($t[$j] * 4) / 5;
}
var_dump($s);

//Хорошо
$realDaysPerIdealDay = 4;
const WORK_DAYS_PER_WEEK = 5;
const NUMBER_OF_TASKS = 34;


$taskEstimate = [];
for($i = 0; $i < NUMBER_OF_TASKS; $i++) {
	$taskEstimate[] = rand(-100, 100);
}

$sum = 0;
for ($j = 0; $j < NUMBER_OF_TASKS; $j++) {
	$reaTaskDays = $taskEstimate[$j] * $realDaysPerIdealDay;
	$reaTaskWeeks = $reaTaskDays / WORK_DAYS_PER_WEEK;
	$sum = $reaTaskWeeks;
}
var_dump($sum);
//==============================


