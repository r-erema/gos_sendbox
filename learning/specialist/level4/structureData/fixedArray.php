<?php
	$arr = new SplFixedArray(4);

	$arr[1] = 1;
	$arr[3] = 31;
	$arr[2] = 21;
	$arr[0] = 3;

	echo "size: ".$arr->getSize()."<br/ >";

	foreach ($arr as $v) {
		echo "$v<br />";
	}

	$arr->setSize(5);
	$arr[4] = 3;
	$arr[4] = 3;

	echo "size: ".$arr->getSize()."<br/ >";

	foreach ($arr as $v) {
		echo "$v<br />";
	}