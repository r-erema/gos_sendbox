<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<ul>
	<li><a href="phpinfo.php"><?php echo 'PHP '.phpversion(); ?></a></li>
	<?php if (function_exists('apache_get_version')): ?><li><?php echo 'Apache '. apache_get_version(); ?></li><?php endif; ?>
</ul>
<?php /* test update */ ?>
<?php /* test update 2 */ ?>
<?php /* test update 3 */ ?>
<?php /* test update 4 */ ?>
<?php /* test update 5 */ ?>
<?php /* test update 6 */ ?>