<?php

declare(strict_types=1);

namespace learning\DDD\WishList\tests\Domain;

use InvalidArgumentException,
    learning\DDD\WishList\src\Domain\WishName,
    PHPUnit\Framework\TestCase;

class WishNameTest extends TestCase
{

    public function testShouldNotCreateWithEmptyString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new WishName('');
    }

    public function testGetValueShouldReturnTheName(): void
    {
        $expected = 'A bucket of candies';
        $name = new WishName($expected);

        static::assertEquals($expected, $name->getValue());
        static::assertEquals($expected, (string) $name);
    }
}