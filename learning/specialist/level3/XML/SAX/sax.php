<meta charset="utf-8">
<html>
<head>
	<title>SAX</title>
</head>
<?php
	$parser = null;
	$parser = xml_parser_create('utf-8');
	$xmlString = file_get_contents('catalog.xml');
	xml_parse($parser, $xmlString);
	xml_set_element_handler($parser, 'onStart', 'onEnd');
	xml_set_character_data_handler($parser, 'onText');

	function onStart($xml, $tag, $attributes) {
		var_dump($xml);
	}
	function onEnd($xml, $tag) {

	}
	function omText($xml, $data) {

	}


?>
<body>
<table border="1">
	<tr>
		<th>Автор</th><th>Название</th><th>Год публикации</th><th>Цена, руб</th>
	</tr>
</table>
</body>
</html>