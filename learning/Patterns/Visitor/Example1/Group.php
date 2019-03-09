<?php

declare(strict_types=1);

namespace learning\Patterns\Visitor\Example1;

class Group implements Role
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return sprintf('Group %s', $this->name);
    }

    public function accept(RoleVisitorInterface $visitor): void
    {
        $visitor->visitGroup($this);
    }

}