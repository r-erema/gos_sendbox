<?php

declare(strict_types=1);

namespace learning\Patterns\Flyweight\Example1\Tests;

use learning\Patterns\Flyweight\Example1\FlyweightFactory;
use PHPUnit\Framework\TestCase;

class FlyweightTest extends TestCase
{

    private static $characters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'],
                   $fonts = ['Arial', 'Times New Roman', 'Verdana', 'Helvetica'];

    public function testFlyweight(): void
    {
        $factory = new FlyweightFactory();
        foreach (self::$characters as $character) {
            foreach (self::$fonts as $font) {
                $flyweight = $factory->get($character);
                $rendered = $flyweight->render($font);
                $this->assertEquals(sprintf('Character %s with font %s', $character, $font), $rendered);
            }
        }
        $this->assertCount(count(self::$characters), $factory);
    }

}
