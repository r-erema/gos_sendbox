<?php
	require_once 'NewsDB.class.php';
	$news = new NewsDB();
	$errMsg = null;
	if( $_SERVER['REQUEST_METHOD'] == 'POST') {
		include 'save_news.inc.php';
	}
?>

<meta charset="utf-8">
<html>
	<head>
		<title>Новостная лента</title>
	</head>
	<body>
	<h1>Последние новости</h1>
	<?php
		if($errMsg) {
			echo "<h3>$errMsg</h3>";
		}
	?>
	<form method="post" action="">
		<label for="title">Заголовок новости:</label><input id="title" type="text" name="title"><br />
		<label for="category">Выберите категорию:</label><br />
		<select id="category" name="category">
			<option value="1">Политика</option>
			<option value="2">Культура</option>
			<option value="3">Cпорт</option>
		</select><br />
		<label for="description">Текст новости:</label><br />
		<textarea name="description" id="description"></textarea><br />
		<label for="source">Источник:</label><input id="source" type="text" name="source"><br />
		<input type="submit" value="Добавить">
	</form>
	<?php
		include 'get_news.inc.php';
	?>
	</body>
</html>