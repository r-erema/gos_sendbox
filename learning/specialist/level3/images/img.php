<?php
	$i = imagecreate(10, 10);
	header('Content-Type: img/gif');
	imagegif($i);