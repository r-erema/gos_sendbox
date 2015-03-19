<?php
	include 'model.php';

	session_start();

	$output = isset($_SESSION['username']) ? $output = "Welcome, {$_SESSION['username']}" : "You are not authorized";

	$dbResult = fetch();