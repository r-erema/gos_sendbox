<?php
	header('Content-Type: text/html;charset=utf-8');
	session_start();
	$result = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(!$_SESSION['randStr']) {
			$result = 'ВКЛЮЧИ ГРАФИКУ';
		} else {
			if($_SESSION['randStr'] == $_POST['code']) {
				$result = 'good)';
			} else {
				$result = 'bad(';
			}
		}
	}
?>
<!doctype html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>registration</title>
		</head>
		<body>
			<form method="post">
				<img src="noise-picture.php">
				<label for="code">Введите код</label><input type="text" name="code" id="code"/>
				<input type="submit">
			</form>
			<?php echo $result; ?>
		</body>
	</html>