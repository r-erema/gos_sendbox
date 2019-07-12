<?php

declare(strict_types=1);

namespace learning\Patterns\ValueObject\Example1;

use InvalidArgumentException;

class Money
{

    private int $amount;
    private Currency $currency;

    public function __construct(int $amount, Currency $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function setCurrency(Currency $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public static function fromMoney(Money $money): self
    {
        return new self($money->getAmount(), $money->getCurrency());
    }

    public function equals(Money $money): bool
    {
        return $money->getCurrency()->equals($this->currency)
               && $money->getAmount() === $this->amount;

    }

    public function add(Money $money): self
    {
        if (!$money->getCurrency()->equals($this->currency)) {
            throw new InvalidArgumentException('Currencies are not equal');
        }
        return new self(
            $money->getAmount() + $this->amount,
            $this->getCurrency()
        );
    }

}