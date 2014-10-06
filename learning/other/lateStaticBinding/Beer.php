<?php

class Beer {

	const NAME = 'Beer!';
	public static $color = 'Yellow!';

	public function getName() {
		return static::NAME;
	}

	public function getColor() {
		return static::$color;
	}
}