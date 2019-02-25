<?php

    namespace learning\Paradigms\TellDontAsk\Example1\AskVersion;

class PaymentService
{

    public function debitCustomer(float $amount, string $customerId): void
    {
        $wallet = WalletRepository::GetWalletByCustomerId($customerId);

        if (!$wallet) {
            throw new \RuntimeException('Customer not found');
        }

        if ($wallet->getBalance() < $amount && !$wallet->overdraftAllowed()) {
            throw new \RuntimeException('"Not enough amount');
        }
        $wallet->setBalance($wallet->getBalance() - $amount);
    }

    public function creditCustomer(float $amount, string $customerId): void
    {
        $wallet = WalletRepository::GetWalletByCustomerId($customerId);

        if (!$wallet) {
            throw new \RuntimeException('Customer not found');
        }

        if ($wallet) {
            $wallet->setBalance($wallet->getBalance() + $amount);
        }
    }

}