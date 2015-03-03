<html>
<head>
	<meta charset="utf-8"/>
	<title>Favorites</title>
</head>
<body>
	<?php
		require_once 'Favorites.class.php';
		$methodsToExecute = [
			'games' => 'getGames',
			'films' => 'getFilms',
			'music' => 'getMusic'
		];

		$favs = new Favorites();
	?>
	<?php foreach($methodsToExecute as $label => $methodName): ?>
	<h1>Favorite <?php echo $label; ?></h1>
	<ul>
		<?php foreach($favs->getFavorites($methodName) as $fav): ?>
		<li><?php echo $fav; ?></li>
		<?php endforeach; ?>
	</ul>
	<hr>
	<?php endforeach;?>
</body>
</html>