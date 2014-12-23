<meta charset="utf-8">
<html>
	<head>
		<title>coder</title>
	</head>
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/js.js"></script>
	<body>
	<div>
		<label for="parser-select">Что верстаем?:</label>
		<select name=parser id="parser-select">
			<option value=""></option>
			<option id="profizDigestParser" value="profizDigestParser">Рассылку profiz.ru</option>
			<option id="normativkaDigestParser" value="normativkaDigestParser">Дайджест</option>
		</select>
	</div>
	<div id="form-wrapper">
		<form id="parse-form" method="post" action="">
			<input type="submit" style="display: none">
		</form>
	</div>
	<p id="inf-message"></p>
	</body>
</html>

<?php
	if(isset($_POST['parserName']) && !empty($_POST['parserName']) && isset($_POST['texts']) && !empty($_POST['texts'])) {
		require_once 'parserController.php';
		$parser = new parserController($_POST['parserName'], $_POST['texts'], ['addresseeForum' => $_POST['addresseeForum']]);
	}

	function __autoload($className) {
		$path = $className.".class.php";
		if (file_exists($path)) {
			require_once $path;
		} else {
			die("The file {$className}.php could not be found!");
		}
	}
