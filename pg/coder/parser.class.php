<?php
	class Parser {

		protected $parsed = [];
		protected $texts;

		public function __construct($texts) {
			$this->texts = $texts;
		}

		public function renderLayout($templatePath) {
			file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
		}
	}