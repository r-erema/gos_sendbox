<?php
	require_once "Auth.class.php";
	$auth = Auth::getInstance();
	$auth->loginByCookie($_COOKIE['login']);
	$auth->logout();
	header('Location: index.php');
