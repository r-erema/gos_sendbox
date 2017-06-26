<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<ul>
	<li><a href="phpinfo.php"><?php echo 'PHP '.phpversion(); ?></a></li>
	<?php if (function_exists('apache_get_version')): ?><li><?php echo 'Apache '. apache_get_version(); ?></li><?php endif; ?>
</ul>
<div>
	<h1>pg</h1>
	<ul>
		<li><a href="pg/coder/">Версталка</a></li>
		<li><a href="pg/check_maillist_profiz">Проверка дюмуленок</a></li>
	</ul>
</div>
<div>
    <h1>machine control</h1>
    <ul>
        <li>
            <a href="machine_control">enter</a>
        </li>
    </ul>
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
        <li>
            <a href="learning/modx">modx</a>
            <ul>
                <li><a href="learning/modx/site">Site</a></li>
                <li><a href="learning/modx/components_development">Components development</a></li>
            </ul>
        </li>
		<li>
			<a href="learning/zf2/public">zf2</a>
		</li>
	</ul>
</div>
</body>
</html>
<?php
class A {
    public static function func(): void {
        echo __FUNCTION__;
    }
}

A::func();
