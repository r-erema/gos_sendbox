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
			<h3>Что верстаем?</h3>
			<ul>
				<li>
					<input type="radio" name="parser-select" id="profizDigestParser" value="profizDigestParser">
					<label for="profizDigestParser">Рассылку profiz.ru</label>
				</li>
				<li>
					<input type="radio" name="parser-select" id="normativkaDigestParser" value="normativkaDigestParser">
					<label for="normativkaDigestParser">Дайджест Нормативка.by</label>
				</li>
			</ul>
		</div>
		<div id="parser-control-panel"></div>
		<div id="form-wrapper">
			<form id="parse-form" method="post" action="parser.class.php">
				<input type="submit" value="Сверстать">
			</form>
		</div>
	</body>
</html>