<?php
	$db = new PDO('sqlite:users-1.db');
	$db->exec('CREATE TABLE user(name)');