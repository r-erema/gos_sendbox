<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Exception;

use RuntimeException;

class UserAlreadySignedUp extends RuntimeException
{
    public function __construct()
    {
        parent::__construct();
    }
}
