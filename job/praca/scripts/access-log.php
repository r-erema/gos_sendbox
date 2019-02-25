<?php
$fp = fopen('/home/erema/ide/goaccess_data/logs/access.log','r');

$groupedByMonth = [];
$linesCount = 0;
while (($line = fgets($fp)) !== false) {
	$linesCount++;
	if (strpos($line, '/notification/archive/')) {
		preg_match('#\[.*?\/(.*?)\/.*\]#', $line, $matches);
		if (!isset($groupedByMonth[$matches[1]])) {
			$groupedByMonth[$matches[1]] = 0;
		} else {
			$groupedByMonth[$matches[1]]++;
		}
	}
	echo $linesCount;
	//echo var_export($groupedByMonth, 1);
	echo "\r";
	//echo "\r";
}
$t = 1;
echo var_export($groupedByMonth, 1);
