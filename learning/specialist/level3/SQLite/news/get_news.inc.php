<?php
	$newsArr = $news->getNews();
	if(!is_array($newsArr)):
		$errMsg = 'Нет новостей';
	else:
?>

<p>Всего новостей: <?php echo count($newsArr);?></p>

<?php
		foreach($newsArr as $newsItem):
			$id = $newsItem['id'];
			$title = $newsItem['title'];
			$category = $newsItem['category'];
			$description = nl2br($newsItem['description']);
			$source = $newsItem['source'];
			$dateTime = date('d-m-Y H:i:s', $newsItem['datetime']);
?>
		<hr>
		<h3><?php echo $title; ?></h3>
		<p><?php echo $description?><br>[<?php echo $category;?>], источник: <?php echo $source; ?>, <?php echo $dateTime;?></p>
		<p><a href="news.php?del=<?php echo $id;?>">Удалить</a></p>

<?php
		endforeach;
	endif;
?>