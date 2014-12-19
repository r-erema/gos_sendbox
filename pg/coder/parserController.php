<?php

class parserController {

	public function __construct($parserName, array $texts = [], array $params = []) {
		$parser = new $parserName($texts);
		$parser->run();
	}

	/*
	private function executeParser($parserName, $text, $context) {
		$parser = new $parserName($text);
		$parser->run();
	}
	*/
}