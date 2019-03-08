<?php

declare(strict_types=1);

namespace learning\Patterns\Proxy\Example2;

class HeavyBankAccount implements BankAccount
{

    private $transactions = [];

    public function deposit(int $amount): void
    {
        $this->transactions[] = $amount;
    }

    public function getBalance(): int
    {
        return array_sum($this->transactions);
    }

}