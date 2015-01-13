<?php
	require_once 'NewsPDO.php';

	$newsDB = new NewsPDO();
	var_dump($newsDB->saveNews('testTitle', 2, 'testDescr', 'testSource'));
	var_dump($newsDB->getNews());