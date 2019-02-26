<?php

declare(strict_types=1);

namespace learning\Patterns\Registry\Example1;

abstract class Registry
{

	public const LOGGER = 'logger';

	private static $storedValues = [];

	private static $allowedKeys = [
		self::LOGGER
	];

	public static function set(string $key, $value): void
	{
		if (!in_array($key, self::$allowedKeys, true)) {
			throw new \InvalidArgumentException('Invalid key given');
		}

		self::$storedValues[$key] = $value;
	}

	public static function get(string $key)
	{
		if (!isset(self::$storedValues[$key])) {
			throw new \InvalidArgumentException('Invalid key given');
		}

		return self::$storedValues[$key];
	}

}