<?php
	class Parser {

		protected $parsed = [];
		protected $params = [];
		protected $text;

		public function __construct($text, array $params = []) {
			$this->text = $text;
			$this->params = $params;
		}

	}