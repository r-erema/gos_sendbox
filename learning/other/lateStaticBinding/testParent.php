<?php

class testParent {

	public function __construct() {
		static::who();
	}

	public static function who() {
		echo __CLASS__;
	}
}