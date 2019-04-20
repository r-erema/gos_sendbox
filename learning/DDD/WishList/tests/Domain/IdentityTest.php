<?php

declare(strict_types=1);

namespace learning\DDD\WishList\tests\Domain;

use Exception,
    learning\DDD\WishList\src\Domain\Exception\InvalidIdentityException,
    learning\DDD\WishList\src\Domain\WishId,
    PHPUnit\Framework\TestCase;

class IdentityTest extends TestCase
{

    /**
     * @throws InvalidIdentityException
     */
    public function testFromValidString(): void
    {

        $string = '550e8400-e29b-41d4-a716-446655440000';
        $wishId = WishId::fromString($string);

        static::assertInstanceOf(WishId::class, $wishId);
        static::assertEquals($string, $wishId->getId());
        static::assertEquals($string, (string) $wishId);
    }

    /**
     * @throws InvalidIdentityException
     * @throws Exception
     */
    public function testEquality(): void
    {
        $string = '550e8400-e29b-41d4-a716-446655440000';
        $wishIdOne = WishId::fromString($string);
        $wishIdTwo = WishId::fromString($string);
        $wishIdThree = WishId::next();

        static::assertTrue($wishIdOne->equalTo($wishIdTwo));
        static::assertFalse($wishIdTwo->equalTo($wishIdThree));
    }
}