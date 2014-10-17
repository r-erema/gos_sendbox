<?php
	define('FILE_NAME', 'rss.xml');
	define('RSS_URL', 'http://localhost/learning/specialist/level3/SQLite/news/rss.xml');

	function download($url, $filename) {
		$file = file_get_contents($url);
		if($file) {
			file_put_contents($filename, $file);
		}
	}

	if(!is_file(FILE_NAME)) {
		download(RSS_URL, FILE_NAME);
	}

	$xml = simplexml_load_file(FILE_NAME);
?>

<meta charset="utf-8">
<html>
<head>
	<title>Новостная лента</title>
</head>
<body>
<h1>Последние новости</h1>
<?php foreach($xml->channel->item as $news): ?>
	<hr>
	<h2><a href="<?php echo $news->link; ?>"><?php echo $news->title; ?></a></h2>
	<i>Дата публикации: <?php echo $news->pubDate; ?></i>;
	<i>Категория: <?php echo $news->category; ?></i>
	<p><?php echo $news->description; ?></p>
<?php endforeach; ?>
<?php
	if(time() > filemtime(FILE_NAME) + 600) {
		download(RSS_URL, FILE_NAME);
	}
?>
</body>
</html>