<?php
declare(strict_types=1);

namespace learning\DDD\WishList\src\Domain;

use /** @noinspection PhpUndefinedClassInspection */
    Webmozart\Assert\Assert;

final class WishName
{

    private $name;

    public function __construct(string $name)
    {
        /** @noinspection PhpUndefinedClassInspection */
        Assert::notEmpty($name, 'Name must not be empty');
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

}