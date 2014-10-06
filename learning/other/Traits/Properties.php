<meta charset="utf-8">
<h1>Свойства</h1>

<?php
	trait ProperiesTrait {
		public $x = 1;
	}

	class PropertiesExample {
		use ProperiesTrait;
	}

	$ex = new PropertiesExample();
	echo $ex->x;