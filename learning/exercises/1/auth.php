<?php


	require_once "Auth.class.php";

	$errors = [];

	if(empty($_POST['login'])) {
		$errors[] = 'Не заполнено поле Логин';
	}

	if(empty($_POST['email'])) {
		$errors[] = 'Не заполнено поле Email';
	}

	if(empty($_POST['password'])) {
		$errors[] = 'Не заполнено поле Пароль';
	}

	if(!empty($errors)) {
		$msg = null;
		foreach($errors as $err) {
			$msg .= "<p style='color: #8b3d1f'>$err</p>";
		}
		die($msg);
	}

	$auth = Auth::getInstance();
	$auth->login($_POST['email'], $_POST['login'], $_POST['password']);

	header('Location: index.php');
