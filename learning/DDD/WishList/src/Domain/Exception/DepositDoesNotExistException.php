<?php

namespace learning\DDD\WishList\src\Domain\Exception;

use Exception,
    learning\DDD\WishList\src\Domain\DepositId;

class DepositDoesNotExistException extends Exception implements DomainExceptionInterface, NotFoundExceptionInterface
{
    public function __construct(DepositId $id)
    {
        parent::__construct('Deposit does not exist: ' . $id);
    }
}
