<?php
	$name = strip_tags($_POST['name']);
	$age = $_POST['age'] * 1;
	print_r($GLOBALS);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>sockets</title>
	</head>
	<body>
	<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($name && $age) {
			echo "<h1>Hi, $name</h1>";
			echo "<h3>You, $age</h3>";
		}
	} else {
		print "<h3>Нет данных для вывода!</h3>";
	}
?>
</body>
</html>