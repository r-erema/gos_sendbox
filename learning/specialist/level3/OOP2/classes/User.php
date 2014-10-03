<?php
/**
 * Created by PhpStorm.
 * User: r.yaroma
 * Date: 03.10.14
 * Time: 10:13
 */

class User extends AUser {
	public  static $countObjects = 0;
	public function __construct() {
		++self::$countObjects;
	}
	public function __clone() {
		++self::$countObjects;
	}
	public function showInfo(){}
}