<?php

declare(strict_types=1);

namespace learning\Patterns\ValueObject\Example1\Tests;

use learning\Patterns\ValueObject\Example1\Currency;
use learning\Patterns\ValueObject\Example1\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{

    public function testCopiedMoneyShouldRepresentSameValue(): void
    {
        $money = new Money(100, new Currency('USD'));
        $copiedMoney = Money::fromMoney($money);
        $this->assertTrue($money->equals($copiedMoney));
    }

    public function testOriginalMoneyShouldNotBeModifiedOnAddition(): void
    {
        $money = new Money(100, new Currency('USD'));
        $money->add(new Money(20, new Currency('USD')));
        $this->assertEquals(100, $money->getAmount());
    }

    public function testMoneysShouldBeAdded(): void
    {
        $money = new Money(100, new Currency('USD'));
        $newMoney = $money->add(new Money(20, new Currency('USD')));
        $this->assertEquals(120, $newMoney->getAmount());
    }

}