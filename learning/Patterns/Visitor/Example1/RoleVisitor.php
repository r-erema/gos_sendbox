<?php

declare(strict_types=1);

namespace learning\Patterns\Visitor\Example1;

class RoleVisitor implements RoleVisitorInterface
{

    private $visited = [];

    public function visitUser(User $role): void
    {
        $this->visited[] = $role;
    }

    public function visitGroup(Group $role): void
    {
        $this->visited[] = $role;
    }

    public function getVisited(): array
    {
        return $this->visited;
    }

}