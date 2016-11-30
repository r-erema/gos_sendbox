<?php
    $dbs = [];
    foreach ($config['mags'] as $mag) {
        $dsn = "mysql:host={$mag['db']['host']};dbname={$mag['db']['db_name']};charset={$mag['db']['charset']}";
	/** @return PDO */
        $dbs[] = new PDO($dsn, $mag['db']['user'], $mag['db']['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }
    return $dbs;