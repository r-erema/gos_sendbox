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

	/**
	 * @expectedException \InvalidArgumentException
	 */
	public function testThrowsExceptionWhenTryingToSetInvalidKey(): void
	{
		Registry::set('foobar', new \stdClass());
	}

	/**
	 * @runInSeparateProcess
	 * @expectedException \InvalidArgumentException
	 */
	public function testThrowsExceptionWhenTryingToGetNotSetKey(): void
	{
		Registry::get(Registry::LOGGER);
	}

}