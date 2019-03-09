<?php

declare(strict_types=1);

namespace learning\Patterns\Visitor\Example1;

interface Role
{
    public function accept(RoleVisitorInterface $visitor): void;
}