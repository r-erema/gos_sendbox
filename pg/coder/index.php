<meta charset="utf-8">
<html>
	<head>
		<title>coder</title>
	</head>
	<body>
		<form method="post" action="">
			<p>
				<label for="object">Что верстаем?:</label>
				<select name=parser id="object">
					<option value="normativkaDigestParser">Дайджест</option>
					<option value="profizDigestParser">Рассылку profiz.ru</option>
				</select>
			</p>
				<p><label for="text">Сюда текст:</label></p>
				<p><textarea id="text" cols="70" rows="30" name="text"></textarea></p>
			<p>
				<input type="submit">
			</p>
		</form>
	</body>
</html>

<?php
	if(isset($_POST['text'])) {
		require_once 'parserController.php';
		$parser = new parserController($_POST['parser'], $_POST['text']);
	}

	function __autoload($className) {
		$path = $className.".class.php";
		if (file_exists($path)) {
			require_once $path;
		} else {
			die("The file {$className}.php could not be found!");
		}
	}
