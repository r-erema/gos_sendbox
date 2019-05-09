<?php

declare(strict_types=1);

namespace learning\Paradigms\TellDontAsk\Example1\TellVersion;

class Wallet
{
    private $ownerId;
    private $balance;
    private $overdraftAllowed;

    public function __construct(string $ownerId, float $balance, bool $overdraftAllowed = false)
    {
        $this->ownerId = $ownerId;
        $this->balance = $balance;
        $this->overdraftAllowed = $overdraftAllowed;
    }

    public function debit(float $amount): void
    {
        if ($this->balance < $amount && !$this->overdraftAllowed) {
            throw new \RuntimeException('"Not enough amount');
        }
        $this->balance -= $amount;
    }

    public function credit(float $amount): void
    {
        $this->balance += $amount;
    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->ownerId;
    }
}
