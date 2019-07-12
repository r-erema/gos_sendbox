<?php

declare(strict_types=1);

namespace learning\Patterns\ValueObject\Example1;

use InvalidArgumentException;

class Currency
{

    private string $isoCode;

    public function __construct(string $isoCode)
    {
        $this->isoCode = $isoCode;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function setIsoCode(string $isoCode): self
    {
        if (!preg_match('/^[A-Z]{3}$/', $isoCode)) {
            throw new InvalidArgumentException('Wrong iso code format');
        }
        $this->isoCode = $isoCode;
        return $this;
    }

    public function equals(Currency $currency): bool
    {
        return $currency->getIsoCode() === $this->isoCode;
    }
}