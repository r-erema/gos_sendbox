<?php
	$heap = new SplMinHeap();
	$heap->insert(11);
	$heap->insert(1);
	$heap->insert(32);


	foreach ($heap as $v) {
		echo "$v<br />";
	}

	$heap = new SplMaxHeap();
	$heap->insert(11);
	$heap->insert(1);
	$heap->insert(112);
	$heap->insert(32);


	foreach ($heap as $v) {
		echo "$v<br />";
	}