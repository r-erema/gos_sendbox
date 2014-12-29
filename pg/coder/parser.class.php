<?php
if(isset($_POST['parserName']) && !empty($_POST['parserName']) && isset($_POST['texts']) && !empty($_POST['texts'])) {
	require_once 'parserController.php';
	$parser = new parserController($_POST['parserName'], $_POST['texts'], $_POST['params']);
}

function __autoload($className) {
	$path = $className.".class.php";
	if (file_exists($path)) {
		require_once $path;
	} else {
		die("The file {$className}.php could not be found!");
	}
}
?>

<?php
	class Parser {

		protected $parsed = [];
		protected $texts;
		const TEMPLATES_DIR = 'templates/';

		public function __construct($texts) {
			$this->texts = $texts;
		}

		public function renderLayout($templatePath) {
			$path = self::TEMPLATES_DIR . $templatePath;
			file_exists($path) ? require_once $path : die("Шаблон '$path' отсутсвует");
		}
	}