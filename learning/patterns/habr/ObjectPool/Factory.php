<?php

namespace ObjectPool;

class Factory {

	/**
	 * @var Product[]
	 */
	protected static $products = [];

	/**
	 * Добавляет продукт в пул
	 *
	 * @param Product $product
	 */
	public static function pushProduct(Product $product) {
		self::$products[$product->getId()] = $product;
	}

	/**
	 * @param $id
	 * @return null|Product
	 */
	public static function getProduct($id) {
		return isset(self::$products[$id]) ? self::$products[$id] : null;
	}

	/**
	 * @param $id
	 */
	public static function removeProduct($id) {
		if (array_key_exists($id, self::$products)) {
			unset(self::$products[$id]);
		}
	}
}