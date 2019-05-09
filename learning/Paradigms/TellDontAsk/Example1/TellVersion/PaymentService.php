<?php

declare(strict_types=1);

namespace learning\Paradigms\TellDontAsk\Example1\TellVersion;

class PaymentService
{
    public function debitCustomer(float $amount, string $customerId): void
    {
        $wallet = WalletRepository::GetWalletByCustomerId($customerId);

        if (!$wallet) {
            throw new \RuntimeException('Customer not found');
        }

        $wallet->debit($amount);
    }
    public function creditCustomer(float $amount, string $customerId): void
    {
        $wallet = WalletRepository::GetWalletByCustomerId($customerId);

        if (!$wallet) {
            throw new \RuntimeException('Customer not found');
        }

        $wallet->credit($amount);
    }
}
