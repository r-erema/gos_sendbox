<?php

namespace learning\DDD\WishList\src\Domain\Exception;

use Exception,
    learning\DDD\WishList\src\Domain\WishId;


class WishIsFulfilledException extends Exception implements DomainExceptionInterface, InvalidOperationExceptionInterface
{
    public function __construct(WishId $wishId)
    {
        parent::__construct("The wish is fulfilled. ID: {$wishId}");
    }
}
