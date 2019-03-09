<?php

declare(strict_types=1);

namespace learning\Patterns\Visitor\Example1;

interface RoleVisitorInterface
{
    public function visitUser(User $role): void;
    public function visitGroup(Group $role): void;
}