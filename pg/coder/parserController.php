<?php

class parserController {

	public function __construct($parserName, array $texts = [], array $params = []) {
		$parser = new $parserName($texts, $params);
		$parser->run();
	}

}