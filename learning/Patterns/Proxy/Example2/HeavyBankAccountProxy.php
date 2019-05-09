<?php

declare(strict_types=1);

namespace learning\Patterns\Proxy\Example2;

class HeavyBankAccountProxy extends HeavyBankAccount
{
    private $balance;

    public function getBalance(): int
    {
        if ($this->balance === null) {
            $this->balance = parent::getBalance();
        }

        return $this->balance;
    }
}
