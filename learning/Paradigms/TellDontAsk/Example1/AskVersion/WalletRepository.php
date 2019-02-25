<?php

declare(strict_types=1);

namespace learning\Paradigms\TellDontAsk\Example1\AskVersion;

class WalletRepository
{

    public static function GetWalletByCustomerId(string $id): ?Wallet
    {
        if ($id === '11') {
            return new Wallet('11', 84.3);
        }
        return null;
    }

}