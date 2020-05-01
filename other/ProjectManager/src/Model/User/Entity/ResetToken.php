<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Entity;

use DateTimeImmutable;
use Webmozart\Assert\Assert;

class ResetToken
{

    private string $token;
    private DateTimeImmutable $expires;

    public function __construct(string $token, DateTimeImmutable $expires)
    {
        Assert::notEmpty($token);
        $this->token = $token;
        $this->expires = $expires;
    }

    public function isExpiredTo(\DateTimeImmutable $date): bool
    {
        return $this->expires <= $date;
    }

}
