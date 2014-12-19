<?php

class parserController {

	public function __construct($parserName, $text = null, array $params = []) {
		$this->executeParser($parserName, $text, $params);
	}

	private function executeParser($parserName, $text, $params) {
		$parser = new $parserName($text, $params);
		$parser->run();
	}

}