<?php

declare(strict_types=1);

namespace learning\DDD\WishList\tests\Domain;

use InvalidArgumentException,
    learning\DDD\WishList\src\Domain\Expense,
    Money\Currency,
    PHPUnit\Framework\TestCase,
    Money\Money;

class ExpenseTest extends TestCase
{

    /**
     * @dataProvider nonsensePriceDataProvider
     */
    public function testPriceAndFeeMustBePositiveNumber(int $price, int $fee, int $initialFund): void
    {
        $this->expectException(InvalidArgumentException::class);
        Expense::fromCurrencyAndScalars(new Currency('USD'), $price, $fee, $initialFund);
    }

    public function nonsensePriceDataProvider(): array
    {
        return [
            'Price must be greater than zero' => [0, 0, 0],
            'Fee must be greater than zero' => [1, 0, 0],
            'Price must be positive' => [-1, -1, 0],
            'Fee must be positive' => [1, -1, 0],
            'Initial fund must be positive' => [2, 1, -1],
        ];
    }

    public function testFeeMustBeLessThanPrice(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 150);
    }

    public function testInitialFundMustBeLessThanPrice(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 50, 150);
    }

    public function testNewPriceMustBeOfTheSameCurrency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $expense = Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 50, 25);
        $expense->changePrice(new Money(200, new Currency('RUB')));
    }

    public function testChangePriceMustReturnANewInstance(): void
    {
        $expense = Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 50, 25);
        $actual = $expense->changePrice(new Money(200, new Currency('USD')));
        static::assertNotSame($expense, $actual);
        static::assertEquals(200, $actual->getPrice()->getAmount());
    }

    public function testNewFeeMustBeOfTheSameCurrency(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $expense = Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 50, 25);
        $expense->changeFee(new Money(200, new Currency('RUB')));
    }


    public function testChangeFeeMustReturnANewInstance(): void
    {
        $expense = Expense::fromCurrencyAndScalars(new Currency('USD'), 100, 10, 25);
        $actual = $expense->changeFee(new Money(20, new Currency('USD')));
        static::assertNotSame($expense, $actual);
        static::assertEquals(20, $actual->getFee()->getAmount());
    }

}