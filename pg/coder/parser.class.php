<meta charset="utf-8">
<?php
if(isset($_POST['parserName']) && !empty($_POST['parserName']) && isset($_POST['texts']) && !empty($_POST['texts'])) {
	require_once 'parserController.php';
	new parserController($_POST['parserName'], $_POST['texts'], $_POST['params']);
}

function __autoload($className) {
	$path = $className.".class.php";
	if (file_exists($path)) {
		require_once $path;
	} else {
		die("The file {$className}.class.php could not be found!");
	}
}
?>

<?php
	abstract class Parser {

		protected $parsed = [];
		protected $texts;
		protected $params;

		private $typographOptions = [
			'Text.paragraphs' => 'off',
			'Text.auto_links' => 'off',
			'Space.autospace_after' => 'off',
			'Abbr.nobr_vtch_itd_itp' => 'off',
			'Nobr.spaces_nobr_in_surname_abbr' => 'off',
			'Space.clear_percent' => 'off',
			'Number.minus_between_nums' => 'off',
			'Number.minus_in_numbers_range' => 'off'
		];

		const TEMPLATES_DIR = 'templates/';

		public function __construct($texts, $params = []) {
			$this->texts = $texts;
			$this->params = $params;
		}

		public function renderLayout($templatePath) {
			$path = self::TEMPLATES_DIR . $templatePath;
			file_exists($path) ? require_once $path : die("Шаблон '$path' отсутсвует");
		}

		protected function typographParsed() {
			array_walk_recursive($this->parsed, function(&$text) {
				$text = EMTypograph::fast_apply($text, $this->typographOptions);
			});
		}

	}