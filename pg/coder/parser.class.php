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