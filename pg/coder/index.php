<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>coder</title>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/newjs.js"></script>
		<link rel="stylesheet" type="text/css" href="css/css.css">
	</head>
	<body>
		<div id="parser-select-wrapper">
			<label for="parser-select">Что верстаем?</label>
			<select name=parser id="parser-select">
				<option></option>
				<option id="profizDigestParser" value="profizDigestParser">Рассылку profiz.ru</option>
				<option id="normativkaDigestParser" value="normativkaDigestParser">Дайджест Нормативка.by</option>
			</select>
		</div>
		<div id="parser-control-panel"></div>
		<div id="form-wrapper">
			<form id="parse-form" method="post" action="parser.class.php">
			</form>
		</div>
	</body>
</html>