<?php
/**
 * php уровень 1: Необходимо сделать форму для авторизации на сайте, для этого делаются 3 обязательных поля:  * login, password, email.
 * Если верно ввели - записываем в куки специальный ключ, при наличии которого выводим человеку кнопку "выйти из сайта".
 * В момент выхода - удалить созданную куку.
 */
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<title>exercise 1</title>
		</head>
		<body>
			<form method="post">
				<label for="login">login: </label><input type="text" id="login" name="data[login]" /><br />
				<label for="password">password: </label><input type="password" id="password" name="data[password]" /><br />
				<label for="email">email: </label><input type="email" id="email" name="data[email]" /><br />
				<input type="submit" /><br />
			</form>
		</body>
	</html>

<?php
	if(isset($_POST['cookies']['delete']) && isset($_COOKIE['ex1'])) {
		setcookie('ex1', "", 1);
		header("Location: 1.php");
	}
	if(!empty($_POST['data'])) {
		$errors = null;
		foreach($_POST as $inputName => $value) {
			if(!$value) {
				$errors .= "Не заполнено поле $inputName.<br />";
			}
		}
		if($errors) {
			die($errors);
		}
		setcookie('ex1', $_POST['data']['login'].$_POST['data']['password']);
		header("Location: 1.php");
	}

?>

<?php if(isset($_COOKIE['ex1'])): ?>
	<form method="post">
		<input type="hidden" name="cookies[delete]">
		<input type="submit" value="Exit">
	</form>
<?php endif; ?>