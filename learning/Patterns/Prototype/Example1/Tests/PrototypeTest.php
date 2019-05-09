<?php

declare(strict_types=1);

namespace learning\Patterns\Prototype\Example1\Tests;

use learning\Patterns\Prototype\Example1\BarBookPrototype;
use learning\Patterns\Prototype\Example1\FooBookPrototype;
use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
    public function testCanGetFooBook(): void
    {
        $fooPrototype = new FooBookPrototype();
        $barPrototype = new BarBookPrototype();

        for ($i = 0; $i < 3; $i++) {
            $book = clone $fooPrototype;
            $title = "Foo Book No {$i}";
            $book->setTitle($title);
            $this->assertInstanceOf(FooBookPrototype::class, $book);
            $this->assertEquals($title, $book->getTitle());
            $this->assertEquals(FooBookPrototype::CATEGORY, $book->getCategory());
        }

        for ($i = 0; $i < 3; $i++) {
            $book = clone $barPrototype;
            $title = "Bar Book No {$i}";
            $book->setTitle($title);
            $this->assertInstanceOf(BarBookPrototype::class, $book);
            $this->assertEquals($title, $book->getTitle());
            $this->assertEquals(BarBookPrototype::CATEGORY, $book->getCategory());
        }
    }
}
