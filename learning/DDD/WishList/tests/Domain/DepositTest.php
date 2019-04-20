<?php

declare(strict_types=1);

namespace learning\DDD\WishList\tests\Domain;

use Exception,
    learning\DDD\WishList\src\Domain\Deposit,
    learning\DDD\WishList\src\Domain\DepositId,
    learning\DDD\WishList\src\Domain\Wish,
    Mockery,
    Money\Currency,
    Money\Money,
    PHPUnit\Framework\TestCase,
    InvalidArgumentException;

class DepositTest extends TestCase
{

    /**
     * @throws Exception
     */
    public function testDepositAmountMustNotBeZero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        /** @var Wish $wish */
        $wish = Mockery::mock(Wish::class);
        $amount = new Money(0, new Currency('USD'));
        /** @var DepositId $depositId */
        $depositId = DepositId::next();
        new Deposit($depositId, $wish, $amount);
    }
}