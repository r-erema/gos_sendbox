<?php

declare(strict_types=1);

namespace learning\Patterns\Facade\Example1;

interface OsInterface
{

    public function halt(): void;

    public function getName(): string;
}