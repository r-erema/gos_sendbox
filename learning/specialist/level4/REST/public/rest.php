<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$host = 'http://localhost/learning/specialist/level4/REST/public/';

$errMsg = $id = $author = $title = $summary = '';

$cmd = 'Add';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['author']) || empty($_POST['title']) || empty($_POST['summary'])) {
		$errMsg = 'Fill all fields';
	} else {
		$str = "title={$_POST['title']}&author={$_POST['author']}&summary={$_POST['summary']}";
		curl_setopt($curl, CURLOPT_POSTFIELDS, $str);

		if (!empty($_POST['id'])) {
			$id = abs((int)$_POST['id']);
			curl_setopt($curl, CURLOPT_URL, $host."books/$id/");
			curl_setopt($curl, CURLOPT_HTTPHEADER, ['X-HTTP-Method-Override: PUT']);
			$result = json_decode(curl_exec($curl));
			if ($result->status) {
				header('Location: rest.php');
			} else {
				$errMsg = 'Failed to update the book';
			}
		} else {
			curl_setopt($curl, CURLOPT_URL, $host."books/");
			curl_setopt($curl, CURLOPT_POST, 1);
			$result = json_decode(curl_exec($curl));
			curl_close($curl);
			if ($result->id) {
				header('Location: rest.php');
			} else {
				$errMsg = 'Failed to add the book';
			}
		}
	}
} else {
	if (isset($_GET['del'])) {
		$id = abs((int)$_GET['del']);
		if ($id) {
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST,'DELETE');
			curl_setopt($curl, CURLOPT_URL, $host."books/$id/");
			$result = json_decode(curl_exec($curl));
			if ($result->status) {
				header('Location: rest.php'); exit;
			} else {
				$errMsg = 'Failed to delete the book';
			}
		}
	} elseif (isset($_GET['update'])) {
		$id = abs((int)$_GET['update']);
		if ($id) {
			curl_setopt($curl, CURLOPT_URL, $host."books/$id/");
			$result = json_decode(curl_exec($curl));
			if ($result->status) {
				$errMsg = 'Failed to get the book';
			} else {
				$cmd = 'Update';
				$title = $result->title;
				$author = $result->author;
				$summary = $result->summary;
				$id = $result->id;
			}
		}
	} else {
		curl_setopt($curl, CURLOPT_URL, $host."books/");
		$result = json_decode(curl_exec($curl));
		curl_close($curl);
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Наша книжная полка</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Наша книжная полка</h1>
<?php
if($errMsg)
	echo $errMsg;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	Название:<br />
	<input type="text" name="title" value="<?=$title?>" /><br />
	Автор:<br />
	<input type="text" name="author" value="<?=$author?>" /><br />
	Описание:<br />
	<textarea name="summary" cols="50" rows="5"><?=$summary?></textarea><br />
	<br />
	<input type="hidden" name="id" value="<?=$id?>" />
	<input type="submit" value="<?=$cmd?>" />
</form>
<?
if($id)
	exit;
?>
<h3>Всего книг в наличие: <?=count($result)?></h3>
<?php
/* Отрисовка списка книг */
$result = $result;
foreach($result as $book){
	echo <<<BOOK
	<hr>
	<p><strong>{$book->title}</strong> by {$book->author}</p>
	<blockquote>{$book->summary}</blockquote>
	<p align="right">
		<a href="rest.php?del={$book->id}">Удалить</a>&nbsp;
		<a href="rest.php?update={$book->id}">Изменить</a>
	</p>
BOOK;
}
?>
</body>
</html>