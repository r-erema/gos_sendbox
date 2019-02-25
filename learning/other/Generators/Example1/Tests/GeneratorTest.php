<?php

namespace learning\other\Generators\Example1\Tests;

use learning\other\Generators\Example1\GeneratorCoroutine;
use PHPUnit\Framework\TestCase;

class GeneratorTest extends TestCase
{

	public function testGenerator(): void
	{
		$result = '';
		foreach (GeneratorCoroutine::xrange(1, 5, 1) as $num) {
			$result .= $num;
		}
		$this->assertEquals('12345', $result);
	}

	public function testGeneratorInstance(): void
	{
		$this->assertInstanceOf(\Iterator::class, GeneratorCoroutine::xrange(1,5,1));
	}

	public function testGeneratorBehaviour(): void
	{
		$generator = GeneratorCoroutine::xrange(1,3,1);
		$this->assertEquals(1, $generator->current());
		$this->assertEquals(1, $generator->current());
		$generator->next();
		$this->assertEquals(2, $generator->current());
		$this->assertTrue($generator->valid());
		$generator->next();
		$this->assertTrue($generator->valid());
		$generator->next();
		$this->assertFalse($generator->valid());
	}

	public function testCoroutineInput(): void
	{
		$logger = GeneratorCoroutine::logger('log');
		$logger->send('Foo');
		$logger->send('Bar');

		$this->assertEquals('FooBar', $GLOBALS['log']);
	}

	public function testCoroutineIO(): void
	{
		$gen = GeneratorCoroutine::gen();
		$this->assertEquals('yield1', $gen->current());
		$this->assertEquals('yield2', $gen->send('ret1'));
		$this->assertEquals($GLOBALS['gen'], 'ret1');
	}

}