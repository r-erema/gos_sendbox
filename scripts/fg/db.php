<?php
	/** @var  $config array*/
	$dsn = "mysql:host={$config['db_server']};dbname={$config['db_name']};charset=utf8";
	/** @return PDO */
	return new PDO($dsn, $config['db_user'], $config['db_pass'], [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);