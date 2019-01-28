<?php

$log = file_get_contents(__DIR__ . '/2019-01-25-error.log');

$messages = explode(str_repeat('-', 100), $log);

foreach ($messages as $message) {

	preg_match('#REMOTE_ADDR: (.*)#', $message, $matches);
	$ip = $matches[1] ?? false;
	$ip && $groupedByIp[$ip][] = trim($message);

	preg_match('# ERR (.*)#', $message, $matches);
	$error = $matches[1] ?? false;
	$error && $groupedByError[$error][] = trim($message);
}
$all = count($messages);
$d = 1;

$y= 1;