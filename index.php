<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    </head>
    <body>
        <ul>
	        <li></li>
            <li><a href="phpinfo.php"><?php echo 'PHP '.phpversion(); ?></a></li>
            <?php if (function_exists('apache_get_version')): ?><li><?php echo 'Apache '. apache_get_version(); ?></li><?php endif; ?>
        </ul>
    </body>
</html>