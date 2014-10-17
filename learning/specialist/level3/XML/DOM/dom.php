<?php
$dom = new DOMDocument();
$dom->load('../catalog.xml');
$dom->preserveWhiteSpace = false;
$root = $dom->documentElement;
$books = $root->childNodes;
?>
<meta charset="utf-8">
<html>
<head>
	<title>DOM</title>
</head>

<body>
<h1>Каталог книг</h1>
<table border="1">
	<tr>
		<th>Автор</th><th>Название</th><th>Год публикации</th><th>Цена, руб</th>
	</tr>
<?php foreach($books as $book): if($book->nodeType == 1): ?>
	<tr>
		<?php foreach($book->childNodes as $item): if($item->nodeType == 1): ?>
			<td><?php echo $item->textContent; ?></td>
		<?php endif; endforeach; ?>
	</tr>
<?php endif; endforeach; ?>
</table>
</body>
</html>