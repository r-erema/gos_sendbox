<?php

declare(strict_types=1);

namespace learning\DDD\WishList\src\Domain;

use DateTimeImmutable,
    DateTimeInterface,
    Money\Money,
    Webmozart\Assert\Assert;

class Deposit
{
    private $id,
            $wish,
            $amount,
            $createdAt;

    public function __construct(DepositId $id, Wish $wish, Money $amount)
    {
        Assert::false($amount->isZero(), 'Deposit must not be empty.');

        $this->id = $id;
        $this->wish = $wish;
        $this->amount = $amount;
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): DepositId
    {
        return $this->id;
    }

    public function getWish(): Wish
    {
        return $this->wish;
    }

    public function getMoney(): Money
    {
        return $this->amount;
    }

    public function getDate(): DateTimeInterface
    {
        return $this->createdAt;
    }

}