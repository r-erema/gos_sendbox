<?php
$parser = null;
$parser = xml_parser_create('utf-8');
$xmlString = file_get_contents('../catalog.xml');
xml_set_element_handler($parser, 'onStart', 'onEnd');
xml_set_character_data_handler($parser, 'onText');
function onStart($xml, $tag, $attributes) {
	if($tag != 'BOOK' && $tag != 'CATALOG') {
		echo '<td>';
	} elseif($tag = 'BOOK') {
		echo '<tr>';
	}
}
function onEnd($xml, $tag) {
	if($tag != 'BOOK' && $tag != 'CATALOG') {
		echo '</td>';
	} elseif($tag = 'BOOK') {
		echo '</tr>';
	}
}
function onText($xml, $data) {
	echo $data;
}
?>
<meta charset="utf-8">
<html>
<head>
	<title>SAX</title>
</head>
<body>
<h1>Каталог книг</h1>
<table border="1">
	<tr>
		<th>Автор</th><th>Название</th><th>Год публикации</th><th>Цена, руб</th>
	</tr>
	<?php xml_parse($parser, $xmlString); ?>
</table>
</body>
</html>