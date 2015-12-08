<?php

namespace Registry;

/**
 * Реестр
 *
 * Class Product
 * @package Registry
 */
class Product {

	/**
	 * @var mixed[]
	 */
	protected static $data = [];

	/**
	 *
	 * Добавляет значение в реестр
	 *
	 * @param $key
	 * @param $value
	 * @return void
	 */
	public static function set($key, $value) {
		self::$data[$key] = $value;
	}

	/**
	 *
	 * Возвращает значение из реестра по ключу
	 *
	 * @param $key
	 * @return mixed|null
	 */
	public static function get($key) {
		return isset(self::$data[$key]) ? self::$data[$key] : null;
	}

	/**
	 *
	 * Удаляет значение из реестра по ключу
	 *
	 * @param $key
	 */
	final public static function removeProduct($key) {
		if (array_key_exists($key, self::$data)) {
			unset(self::$data[$key]);
		}
	}
}