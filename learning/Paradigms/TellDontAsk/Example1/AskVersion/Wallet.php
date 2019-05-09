<?php

namespace learning\Paradigms\TellDontAsk\Example1\AskVersion;

class Wallet
{
    private $id;
    private $balance;
    private $overdraftAllowed;

    public function __construct(string $id, float $balance, bool $overdraftAllowed = false)
    {
        $this->id = $id;
        $this->balance = $balance;
        $this->overdraftAllowed = $overdraftAllowed;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): void
    {
        $this->balance = $balance;
    }

    public function overdraftAllowed(): bool
    {
        return $this->overdraftAllowed;
    }
}
