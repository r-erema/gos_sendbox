<?php

declare(strict_types=1);

namespace learning\Patterns\Adapter\Example1;

interface EBookInterface
{
    public function unlock(): void;

    public function pressNext(): void;

    public function getPage(): array;
}
