<meta charset="utf-8">
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<ul>
	<li><a href="phpinfo.php"><?php echo 'PHP '.phpversion();?></a></li>
	<li><?php echo 'Apache '.apache_get_version();?></li>
</ul>
<div>
	<h1>pg</h1>
	<ul>
		<li><a href="pg/coder/">Версталка</a></li>
		<li><a href="pg/check_maillist_profiz">Проверка дюмуленок</a></li>
	</ul>
</div>
<div>
	<h1>learning</h1>
	<ul>
		<li><a href="learning/specialist">specialist</a>
			<ul>
				<li><a href="learning/specialist/level1">level1</a></li>
				<li><a href="learning/specialist/level2">level2</a></li>
				<li><a href="learning/specialist/level3">level3</a></li>
				<li><a href="learning/specialist/level4">level4</a></li>
			</ul>
		</li>
		<li><a href="learning/php.net">php.net</a>
			<ul>
				<li><a href="learning/php.net/links">links</a><li>
			</ul>
		</li>
		<li>
			<a href="learning/other">other</a>
			<ul>
				<li><a href="learning/other/links">links</a></li>
				<li><a href="learning/other/lateStaticBinding">Late Static Binding</a></li>
			</ul>
		</li>
	</ul>
</div>
</body>
</html>