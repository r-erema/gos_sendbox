<?php

class B extends A {
	/*
	const NAME = 'B1';

	public static function who() {
		echo __CLASS__;
	}
*/

	public static function test() {
		A::foo();
		parent::foo();
		static::foo();
	}

	public static function foo() {
		echo __CLASS__;
	}
} 