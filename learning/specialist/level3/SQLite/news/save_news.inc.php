<?php
	$title = $news->clearStr($_POST['title']);
	$description = $news->clearStr($_POST['description']);
	$source = $news->clearStr($_POST['source']);
	$category = $news->clearInt($_POST['category']);

	if(empty($title) || empty($description)) {
		$errMsg = 'Заполните все обязательные поля';
	} else {
		$news->saveNews($title, $category, $description, $source);
		header('Location: news.php');
	}