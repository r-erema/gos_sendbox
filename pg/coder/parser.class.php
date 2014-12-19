<?php
	class Parser {

		protected $parsed = [];
		protected $text;

		public function __construct($text, $context) {
			$this->text = $text;
			$this->context = $context;
		}

	}