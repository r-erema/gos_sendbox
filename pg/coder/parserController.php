<?php

class parserController {

	public function __construct($parserName, array $texts = [], array $params = []) {
		foreach($texts as $context => $text) {
			$this->executeParser($parserName, $text, $context);
		}

	}

	private function executeParser($parserName, $text, $context) {
		$parser = new $parserName($text, $context);
		$parser->run();
	}

}