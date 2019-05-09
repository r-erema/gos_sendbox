<?php
declare(strict_types=1);

namespace learning\Patterns\Adapter\Example1;

interface BookInterface
{
    public function turnPage(): void;
    public function open(): void;
    public function getPage(): int;
}
