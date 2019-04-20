<?php /** @noinspection PhpUndefinedClassInspection */

    declare(strict_types=1);

namespace learning\DDD\WishList\src\Domain;

use DateInterval,
    DateTimeImmutable,
    DateTimeInterface,
    Doctrine\Common\Collections\ArrayCollection,
    Money\Money,
    Exception,
    learning\DDD\WishList\src\Domain\Exception\DepositDoesNotExistException,
    learning\DDD\WishList\src\Domain\Exception\DepositIsTooSmallException,
    learning\DDD\WishList\src\Domain\Exception\WishIsFulfilledException,
    learning\DDD\WishList\src\Domain\Exception\WishIsUnpublishedException,
    Money\Currency,
    Webmozart\Assert\Assert;

class Wish
{

    private $id,
            $name,
            $expense,
            $deposits,
            $published,
            $createdAt,
            $updatedAt;

    public function __construct(WishId $id, WishName $name, Expense $expense, DateTimeInterface $createdAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->expense = $expense;

        $this->deposits = new ArrayCollection();
        $this->createdAt = $createdAt ?? new DateTimeImmutable();
        $this->updatedAt = $createdAt ?? new DateTimeImmutable();
    }

    /**
     * @param Money $amount
     * @return Deposit
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws Exception
     */
    public function deposit(Money $amount): Deposit
    {
        $this->assertCanDeposit($amount);
        $deposit = new Deposit(DepositId::next(), $this, $amount);
        $this->deposits->add($deposit);
        return $deposit;
    }

    /**
     * @param Money $amount
     * @throws DepositIsTooSmallException
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     */
    public function assertCanDeposit(Money $amount): void
    {
        if (!$this->published) {
            throw new WishIsUnpublishedException($this->id);
        }

        if ($this->isFulfilled()) {
            throw new WishIsFulfilledException($this->id);
        }

        if ($amount->lessThan($this->getFee())) {
            throw new DepositIsTooSmallException($amount, $this->getFee());
        }

        Assert::true(
            $amount->isSameCurrency($this->expense->getPrice()),
            'Deposit currency must match the price\'s one.'
        );
    }

    public function isFulfilled(): bool
    {
        return $this->getFund()->greaterThanOrEqual($this->expense->getPrice());
    }

    public function publish(): void
    {
        $this->published = true;
        $this->updatedAt = new DateTimeImmutable();
    }

    public function unpublish(): void
    {
        $this->published = false;
        $this->updatedAt = new DateTimeImmutable();
    }

    public function getFee(): Money
    {
        return $this->expense->getFee();
    }

    public function getFund(): Money
    {
        return array_reduce($this->deposits->toArray(), static function (Money $fund, Deposit $deposit) {
            return $fund->add($deposit->getMoney());
        }, $this->expense->getInitialFund());
    }

    /**
     * @return array|Deposit[]
     */
    public function getDeposits(): array
    {
        return $this->deposits->toArray();
    }

    /**
     * @param DepositId $depositId
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     * @throws DepositDoesNotExistException
     */
    public function withdraw(DepositId $depositId): void
    {
        $this->assertCanWithdraw();

        $deposit = $this->getDepositById($depositId);
        $this->deposits->removeElement($deposit);
    }

    /**
     * @param DepositId $depositId
     * @return Deposit
     * @throws DepositDoesNotExistException
     */
    private function getDepositById(DepositId $depositId): Deposit
    {
        $deposit = $this->deposits->filter(static function (Deposit $deposit) use ($depositId) {
            return $deposit->getId()->equalTo($depositId);
        })->first();

        if (!$deposit) {
            throw new DepositDoesNotExistException($depositId);
        }

        return $deposit;
    }

    /**
     * @throws WishIsFulfilledException
     * @throws WishIsUnpublishedException
     */
    private function assertCanWithdraw(): void
    {
        if (!$this->published) {
            throw new WishIsUnpublishedException($this->id);
        }

        if ($this->isFulfilled()) {
            throw new WishIsFulfilledException($this->id);
        }
    }

    public function getPrice(): Money
    {
        return $this->expense->getPrice();
    }

    public function getCurrency(): Currency
    {
        return $this->expense->getCurrency();
    }

    public function calculateSurplusFunds(): Money
    {
        $difference = $this->getPrice()->subtract($this->getFund());

        return $difference->isNegative()
            ? $difference->absolute()
            : new Money(0, $this->getCurrency());
    }

    public function predictFulfillmentDateBasedOnFee(): DateTimeInterface
    {
        $daysToGo = ceil(
            $this->getPrice()
                ->divide($this->getFee()->getAmount())
                ->getAmount()
        );

        return $this->createFutureDate($daysToGo);
    }

    public function predictFulfillmentDateBasedOnFund(): DateTimeInterface
    {
        $daysToGo = ceil(
            $this->getPrice()
                ->subtract($this->getFund())
                ->divide($this->getFee()->getAmount())
                ->getAmount()
        );

        return $this->createFutureDate($daysToGo);
    }

    private function createFutureDate($daysToGo): DateTimeInterface
    {
        return (new DateTimeImmutable())->add(new DateInterval("P{$daysToGo}D"));
    }

    /**
     * @return DateTimeImmutable|DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeImmutable|DateTimeInterface
     */
    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function isPublished(): bool
    {
        return $this->published;
    }

    public function changeFee(Money $amount): void
    {
        $this->expense = $this->expense->changeFee($amount);
        $this->updatedAt = new DateTimeImmutable();
    }

    public function changePrice(Money $amount): void
    {
        $this->expense = $this->expense->changePrice($amount);
        $this->updatedAt = new DateTimeImmutable();
    }

}