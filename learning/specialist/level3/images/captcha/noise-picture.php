<?php
	session_start();
	$i = imagecreatefrompng('img.png');
	$color = imagecolorallocate($i, 64,64,64);
	imageantialias($i, true);
	$nChars = 5;
	$randStr = substr(md5(uniqid()), 0, $nChars);

	$_SESSION['randStr'] = $randStr;

	$x = 20; $y = 30; $deltaX = 40;

	for($j = 0; $j < $nChars; $j++) {
		$size = rand(18, 30);
		$angle = -30 + rand(0, 60);
		imagettftext($i, $size, $angle, $x, $y, $color, 'a_Albionic.ttf', $randStr{$j});
		$x += $deltaX;
	}

	header('Content-Type: image/png');
	imagepng($i, null);