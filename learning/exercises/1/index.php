<?php
/**
 * Необходимо сделать форму для авторизации на сайте, для этого делаются 3 обязательных поля: login, password, email.
 * Если верно ввели - записываем в куки специальный ключ, при наличии которого выводим человеку кнопку "выйти из сайта".
 * В момент выхода - удалить созданную куку..
 */
require_once "Auth.class.php";
$auth = Auth::getInstance();
if(isset($_COOKIE['login'])) {
	$auth->loginByCookie($_COOKIE['login']);
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<title>auth cookie</title>
	</head>
	<body>
	<?php if($auth->isAuthenticate): ?>
		<h3><?php echo $auth->getLogin(); ?></h3>
		<h4><?php echo $auth->getEmail(); ?></h4>
		<form action="logout.php" method="post">
			<input type="hidden" name="deleteCookie">
			<input type="submit" value="Выйти">
		</form>
	<?php else: ?>
		<form action="auth.php" method="post">
			<div>
				<div>
					<label for="email">Email </label>
				</div>
				<input id="email" name="email" type="email">
			</div>
			<div>
				<div>
					<label for="login">Login </label>
				</div>
				<input id="login" name="login" type="text">
			</div>
			<div>
				<div>
					<label for="password">Password </label>
				</div>
				<input id="password" name="password" type="password">
			</div>
			<div>
				<input type="submit" value="Войти">
			</div>
			</form>
	<?php endif; ?>
	</body>
</html>