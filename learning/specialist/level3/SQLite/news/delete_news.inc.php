<?php
	$id = $news->clearInt($_GET['del']);
	if($id) {
		if(!$news->deleteNews($id)) {
			$errMsg = 'Произошла ошибка удаления новости';
		} else {
			header('Location: news.php');
			exit;
		}
	}