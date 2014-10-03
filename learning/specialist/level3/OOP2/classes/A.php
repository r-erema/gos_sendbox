<?php

class A {
	public static function whoAmI() {
		echo __CLASS__;
	}

	public static function identity() {
		static::whoAmI();
	}
}