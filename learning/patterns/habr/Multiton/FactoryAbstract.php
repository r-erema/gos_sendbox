<?php

namespace Multiton;

/**
 * Общий интерфейс пула одиночек
 *
 * Class FactoryAbstract
 * @package Multiton
 */
abstract class FactoryAbstract {

	/**
	 * @var array
	 */
	protected static $instances = [];

	/**
	 * Возвращает экземпляр класса, из которого вызван
	 * @return mixed
	 */
	public static function getInstance() {
		$className = static::getClassName();
		if (!(isset(self::$instances[$className]) && self::$instances[$className] instanceof $className)) {
			self::$instances[$className] = new $className();
		}
		return self::$instances[$className];
	}

	/**
	 * Удаляет экземпляр класса, из которого вызван
	 */
	public static function removeInstance() {
		$className = static::getClassName();
		if (array_key_exists($className, self::$instances)) {
			unset(self::$instances[$className]);
		}
	}

	/**
	 * Возвращает имя экземпляра класса
	 *
	 * @return string
	 */
	final protected static function getClassName() {
		return get_called_class();
	}

	protected function __construct() {}
	protected function __clone() {}
	protected function __sleep() {}
	protected function __wakeup() {}


}
