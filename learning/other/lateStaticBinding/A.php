<?php
/**
 * Created by PhpStorm.
 * User: GutsOut
 * Date: 03.10.14
 * Time: 22:51
 */

class A {

	/*const NAME = 'A1';

	public static function who() {
		echo __CLASS__;
	}

	public static function test() {
		self::who();
	}

	public static function getName() {
		return self::NAME;
	}

	public static function getStaticName() {
		return static::NAME;
	}
	*/

	public static function foo() {
		static::who();
	}

	public static function who() {
		echo __CLASS__;
	}
}