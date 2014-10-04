<?php

class testChild {
	public function __construct() {
		static::who();
	}

	public static function who() {
		echo __CLASS__;
	}

	public function test() {
		$o = new testParent();
	}
}