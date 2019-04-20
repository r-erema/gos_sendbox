<?php

declare(strict_types=1);

namespace learning\DDD\WishList\tests\Domain;

use DateInterval;
use DateTimeImmutable;
use Exception,
    learning\DDD\WishList\src\Domain\Exception\DepositIsTooSmallException,
    learning\DDD\WishList\src\Domain\Exception\WishIsFulfilledException,
    learning\DDD\WishList\src\Domain\Exception\WishIsUnpublishedException,
    learning\DDD\WishList\src\Domain\Expense,
    learning\DDD\WishList\src\Domain\Wish,
    learning\DDD\WishList\src\Domain\WishId,
    learning\DDD\WishList\src\Domain\WishName,
    Money\Currency,
    PHPUnit\Framework\TestCase,
    Money\Money,
    InvalidArgumentException,
    learning\DDD\WishList\src\Domain\DepositId,
    learning\DDD\WishList\src\Domain\Exception\DepositDoesNotExistException;

class WishTest extends TestCase
{

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testMustDeclineDepositIfItIsLessThanFee(): void
    {
        $this->expectException(DepositIsTooSmallException::class);
        $wish = $this->createWishWithPriceAndFee(1000, 100);
        $wish->publish();

        $wish->deposit(new Money(50, new Currency('USD')));
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testExtraDepositMustFulfillTheWish(): void
    {
        $wish = $this->createWishWithPriceAndFund(1000, 900);
        $wish->publish();
        $wish->deposit(new Money(150, new Currency('USD')));
        static::assertTrue($wish->isFulfilled());
    }

    /**
     * @throws Exception
     */
    public function testMustNotDepositWhenUnpublished(): void
    {
        $this->expectException(WishIsUnpublishedException::class);
        $wish = $this->createWishWithEmptyFund();
        $wish->deposit(new Money(100, new Currency('USD')));
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testMustNotDepositWhenFulfilled(): void
    {
        $this->expectException(WishIsFulfilledException::class);
        $fulfilled = $this->createWishWithPriceAndFund(500, 450);
        $fulfilled->publish();
        $fulfilled->deposit(new Money(100, new Currency('USD')));
        $fulfilled->deposit(new Money(100, new Currency('USD')));
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testDepositShouldAddDepositToInternalCollection(): void
    {
        $wish = $this->createWishWithEmptyFund();
        $wish->publish();
        $depositMoney = new Money(150, new Currency('USD'));

        $wish->deposit($depositMoney);

        $deposits = $wish->getDeposits();
        static::assertCount(1, $deposits);
        static::assertArrayHasKey(0, $deposits);

        $deposit = $deposits[0];
        static::assertTrue($deposit->getMoney()->equals($depositMoney));
        static::assertSame($wish, $deposit->getWish());
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testDepositAndPriceCurrenciesMustMatch(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $wish = $this->createWishWithEmptyFund();
        $wish->publish();

        $wish->deposit(new Money(125, new Currency('RUB')));
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testMustNotWithdrawIfUnpublished(): void
    {
        $this->expectException(WishIsUnpublishedException::class);
        $wish = $this->createWishWithPriceAndFund(500, 0);
        $wish->publish();
        $deposit = $wish->deposit(new Money(100, new Currency('USD')));
        $wish->unpublish();

        $wish->withdraw($deposit->getId());
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testMustNotWithdrawIfFulfilled(): void
    {
        $this->expectException(WishIsFulfilledException::class);
        $wish = $this->createWishWithPriceAndFund(500, 450);
        $wish->publish();
        $deposit = $wish->deposit(new Money(100, new Currency('USD')));

        $wish->withdraw($deposit->getId());
    }

    /**
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testWithdrawMustThrowOnNonExistentId(): void
    {
        $this->expectException(DepositDoesNotExistException::class);
        $wish = $this->createWishWithEmptyFund();
        $wish->publish();

        /** @var DepositId $depositId */
        $depositId = DepositId::next();
        $wish->withdraw($depositId);
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testWithdrawShouldRemoveDepositFromInternalCollection(): void
    {
        $wish = $this->createWishWithEmptyFund();
        $wish->publish();
        $wish->deposit(new Money(150, new Currency('USD')));

        $wish->withdraw($wish->getDeposits()[0]->getId());

        static::assertCount(0, $wish->getDeposits());
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testSurplusFundsMustBe100(): void
    {
        $wish = $this->createWishWithPriceAndFund(500, 300);
        $wish->publish();

        $wish->deposit(new Money(100, new Currency('USD')));
        $wish->deposit(new Money(200, new Currency('USD')));

        $expected = new Money(100, new Currency('USD'));
        static::assertTrue($wish->calculateSurplusFunds()->equals($expected));
    }

    /**
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function testSurplusFundsMustBeZero(): void
    {
        $wish = $this->createWishWithPriceAndFund(500, 250);
        $wish->publish();

        $wish->deposit(new Money(100, new Currency('USD')));

        $expected = new Money(0, new Currency('USD'));
        static::assertTrue($wish->calculateSurplusFunds()->equals($expected));
    }

    /**
     * @throws Exception
     */
    public function testFulfillmentDatePredictionBasedOnFee(): void
    {
        $price = 1500;
        $fee = 20;
        $wish = $this->createWishWithPriceAndFee($price, $fee);
        $daysToGo = ceil($price / $fee);

        $expected = (new DateTimeImmutable())->add(new DateInterval("P{$daysToGo}D"));

        static::assertEquals(
            $expected->getTimestamp(),
            $wish->predictFulfillmentDateBasedOnFee()->getTimestamp()
        );
    }

    public function testFulfillmentDatePredictionBasedOnFund(): void
    {
        $price = 1500;
        $fund = 250;
        $fee = 25;
        $wish = $this->createWish($price, $fee, $fund);
        $daysToGo = ceil(($price - $fund) / $fee);

        $expected = (new DateTimeImmutable())->add(new DateInterval("P{$daysToGo}D"));

        static::assertEquals(
            $expected->getTimestamp(),
            $wish->predictFulfillmentDateBasedOnFund()->getTimestamp()
        );
    }

    /**
     * @throws Exception
     */
    public function testPublishShouldPublishTheWish(): void
    {
        $wish = $this->createWishWithEmptyFund();
        $updatedAt = $wish->getUpdatedAt();

        $wish->publish();

        static::assertTrue($wish->isPublished());
        static::assertNotSame($updatedAt, $wish->getUpdatedAt());
    }

    /**
     * @throws Exception
     */
    public function testUnpublishShouldUnpublishTheWish(): void
    {
        $wish = $this->createWishWithEmptyFund();
        $updatedAt = $wish->getUpdatedAt();

        $wish->unpublish();

        static::assertFalse($wish->isPublished());
        static::assertNotSame($updatedAt, $wish->getUpdatedAt());
    }

    /**
     * @throws Exception
     */
    public function testChangePrice(): void
    {
        $wish = $this->createWishWithPriceAndFee(1000, 10);
        $expected = new Money(1500, new Currency('USD'));
        $updatedAt = $wish->getUpdatedAt();

        static::assertSame($updatedAt, $wish->getUpdatedAt());

        $wish->changePrice($expected);

        static::assertTrue($wish->getPrice()->equals($expected));
        static::assertNotSame($updatedAt, $wish->getUpdatedAt());
    }

    /**
     * @throws Exception
     */
    public function testChangeFee(): void
    {
        $wish = $this->createWishWithPriceAndFee(1000, 10);
        $expected = new Money(50, new Currency('USD'));
        $updatedAt = $wish->getUpdatedAt();

        static::assertSame($updatedAt, $wish->getUpdatedAt());

        $wish->changeFee($expected);

        static::assertTrue($wish->getFee()->equals($expected));
        static::assertNotSame($updatedAt, $wish->getUpdatedAt());
    }

    /**
     * @param int $price
     * @param int $fee
     * @param int $fund
     * @return Wish
     * @throws Exception
     */
    private function createWish(int $price, int $fee, int $fund): Wish
    {
        /** @var WishId $wishId */
        $wishId = WishId::next();
        return new Wish(
            $wishId,
            new WishName('Bicycle'),
            Expense::fromCurrencyAndScalars(
                new Currency('USD'),
                $price,
                $fee,
                $fund
            )
        );
    }

    /**
     * @return Wish
     * @throws Exception
     */
    private function createWishWithEmptyFund(): Wish
    {
        /** @var WishId $wishId */
        $wishId = WishId::next();
        return new Wish(
            $wishId,
            new WishName('Bicycle'),
            Expense::fromCurrencyAndScalars(
                new Currency('USD'),
                1000,
                100
            )
        );
    }

    /**
     * @param int $price
     * @param int $fund
     * @return Wish
     * @throws Exception
     */
    private function createWishWithPriceAndFund(int $price, int $fund): Wish
    {
        /** @var WishId $wishId */
        $wishId = WishId::next();
        return new Wish(
            $wishId,
            new WishName('Bicycle'),
            Expense::fromCurrencyAndScalars(
                new Currency('USD'),
                $price,
                10,
                $fund
            )
        );
    }

    /**
     * @param int $price
     * @param int $fee
     * @return Wish
     * @throws Exception
     */
    private function createWishWithPriceAndFee(int $price, int $fee): Wish
    {
        /** @var WishId $wishId */
        $wishId = WishId::next();
        return new Wish(
            $wishId,
            new WishName('Bicycle'),
            Expense::fromCurrencyAndScalars(
                new Currency('USD'),
                $price,
                $fee
            )
        );
    }
}