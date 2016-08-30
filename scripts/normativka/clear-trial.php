#!/usr/bin/env php
<?php

	$config = require __DIR__ . '/config.php';
	/** @var PDO $pdo */
	$pdo = require __DIR__ . '/db.php';

	$opts = getopt('l:');
	$login = isset($opts['l']) ? $opts['l'] : $config['my_login'];

	$stmt = $pdo->prepare('
		DELETE FROM nr_trial_users_phones 
		WHERE tup_user_id = (SELECT user_id FROM fn_users WHERE user_login = ? LIMIT 0,1)
	');

	if (!$stmt->execute([$login])) {
		exit(2);
	}
	if (!$stmt->rowCount()) {
		echo 'Нет триала для удаления' . PHP_EOL;
	} else {
		echo "Триал для пользователя {$login} удалён" . PHP_EOL;
	}
	exit(0);