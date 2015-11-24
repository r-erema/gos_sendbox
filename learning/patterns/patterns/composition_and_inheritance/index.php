<?php

require_once 'strategy/CostStrategy.php';
require_once 'strategy/FixedCostStrategy.php';
require_once 'strategy/TimedCostStrategy.php';
require_once 'strategy/Lesson.php';
require_once 'strategy/Lecture.php';
require_once 'strategy/Seminar.php';



$lessons[] = new Seminar(3, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());

/**
 * @var $lessons Lesson[]
 */
foreach ($lessons as $lesson) {
	print "Cost: {$lesson->cost()}; ";
	print "Type: {$lesson->chargeType()};";
	print "<br />";
}


