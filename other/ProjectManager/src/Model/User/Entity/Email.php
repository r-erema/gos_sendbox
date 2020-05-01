<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Entity;

use Webmozart\Assert\Assert;

class Email
{
    private string $value;

    public function __construct(string $value)
    {
        Assert::notEmpty($value);
        Assert::email($value);
        $this->value = mb_strtolower($value);
    }

    public function getValue()
    {
        return $this->value;
    }

}
