<meta charset="utf-8">
<html>
	<head>
		<title>coder</title>
	</head>
	<body>
		<form method="post" action="">
			<p>
				<label for="object">Что верстаем?:</label>
				<select name="object" id="object">
					<option>Дайджест</option>
					<option>Рассылку profiz.ru</option>
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
		require_once 'parser.class.php';
		$parser = new Parser($_POST['text']);
	}
