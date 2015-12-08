<?php

namespace Singleton;

class Product {

	/**
	 * @var self
	 */
	private static $instance;

	public $name;

	/**
	 * @return Product
	 */
	public static function getInstance() {
		if (!(self::$instance instanceof self)) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Product constructor.
	 */
	private function __construct() {}

	private function __sleep() {}

	private function __wakeup() {}

	private function __clone() {}


}