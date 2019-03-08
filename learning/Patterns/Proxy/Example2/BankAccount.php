<?php

declare(strict_types=1);

namespace learning\Patterns\Proxy\Example2;

interface BankAccount
{
    public function deposit(int $amount): void;

    public function getBalance(): int;
}