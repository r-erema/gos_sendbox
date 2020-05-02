<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\Exception;

use Exception;

class EntityNotFoundException extends Exception
{
    public function __construct(string $className, array $searchParams = [])
    {
        $searchStr = $searchParams ? implode(',', $searchParams) : '';
        parent::__construct(sprintf('Entity `%s` not found, search params: %s', $className, $searchStr));
    }
}
