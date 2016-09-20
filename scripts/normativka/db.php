<?php
	/** @var  $config array*/
	$dsn = "mysql:host={$config['db']['host']};dbname={$config['db']['db_name']};charset={$config['db']['charset']}";
	/** @return PDO */
	return new PDO($dsn, $config['db']['user'], $config['db']['password'], [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);