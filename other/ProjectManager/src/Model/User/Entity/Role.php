<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Entity;

use Webmozart\Assert\Assert;
class Role
{

    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    private string $value;

    public function __construct(string $value)
    {
        Assert::oneOf($value, [self::ROLE_USER, self::ROLE_ADMIN]);
        $this->value = $value;
    }

    public static function user(): self
    {
        return new self(self::ROLE_USER);
    }

    public static function admin(): self
    {
        return new self(self::ROLE_ADMIN);
    }

    public function isUser(): bool
    {
        return $this->value === self::ROLE_USER;
    }

    public function isAdmin(): bool
    {
        return $this->value === self::ROLE_ADMIN;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
