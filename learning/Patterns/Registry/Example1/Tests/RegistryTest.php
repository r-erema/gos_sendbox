<?php

namespace learning\Patterns\Registry\Example1\Tests;

use learning\Patterns\Registry\Example1\Registry,
	PHPUnit\Framework\TestCase;

class RegistryTest extends TestCase
{

	public function testSetAndGetLogger(): void
	{
		$key = Registry::LOGGER;
		$logger = new \stdClass();
		Registry::set($key, $logger);
		$storedLogger = Registry::get($key);
		$this->assertSame($logger, $storedLogger);
		$this->assertInstanceOf(\stdClass::class, $storedLogger);
	}

	public function testThrowsExceptionWhenTryingToSetInvalidKey(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Registry::set('foobar', new \stdClass());
	}

	/**
	 * @runInSeparateProcess
	 */
	public function testThrowsExceptionWhenTryingToGetNotSetKey(): void
	{
		$this->expectException(\InvalidArgumentException::class);
		Registry::get(Registry::LOGGER);
	}

}