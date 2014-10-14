<?php
	$title = $news->clearStr($_POST['title']);
	$description = $news->clearStr($_POST['description']);
	$source = $news->clearStr($_POST['source']);
	$category = $news->clearInt($_POST['category']);

	if(!$news->saveNews($title, $category, $description, $source)) {
		$errMsg = 'Заполните все обязательные поля';
	} else {
		header('Location: news.php');
		exit;
	}