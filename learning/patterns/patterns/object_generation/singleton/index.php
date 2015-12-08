<?php
require_once 'classes/Preferences.php';

$pref = Preferences::getInstance();
$pref->setProperty('name', 'Иван');

unset($pref);

$pref2 = Preferences::getInstance();
print $pref2->getProperty('name') . PHP_EOL;