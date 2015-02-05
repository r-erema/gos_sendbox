<?php session_start(); ?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>cookies and session management</title>
	</head>
	<body>
<!--		--><?php
/*			setcookie('asdf', 'sadfsad');
			setcookie('as213', 'vdczsx');
			setcookie('345ee', 'dcvb');
			setcookie('eessf', '158vcx');
		*/?>
		<?php if(isset($_COOKIE) && !empty($_COOKIE)): ?>
		<h1>cookies</h1>
		<ul>
		<?php foreach($_COOKIE as $cookieName => $cookieValue): ?>
			<li>Cookie name: <?php echo $cookieName;?> value: <?php echo $cookieValue; ?></li>
		<?php endforeach; ?>
		</ul>
		<form method="post" action="cookieAndSessionManagment.php">
			<input type="hidden" name="action" value="deleteCookies">
			<input type="submit" value="Delete cookies">
		</form>
		<?php endif; ?>
		<?php if(isset($_SESSION) && !empty($_SESSION)): ?>
		<h1>sessions</h1>
		<ul>
		<?php foreach($_SESSION as $cookieName => $cookieValue): ?>
			<li>Cookie name: <?php echo $cookieName;?> value <?php echo $cookieValue; ?></li>
		<?php endforeach; ?>
		</ul>
			<form method="post" action="cookieAndSessionManagment.php">
				<input type="hidden" name="action" value="deleteSessions">
				<input type="submit" value="Delete sessions">
			</form>
		<?php endif; ?>
	</body>
</html>