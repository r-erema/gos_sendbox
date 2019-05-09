<?php

declare(strict_types=1);

namespace learning\Patterns\Visitor\Example1\Tests;

use learning\Patterns\Visitor\Example1\Group;
use learning\Patterns\Visitor\Example1\Role;
use learning\Patterns\Visitor\Example1\RoleVisitor;
use learning\Patterns\Visitor\Example1\User;
use PHPUnit\Framework\TestCase;

class VisitorTest extends TestCase
{

    /**
     * @var RoleVisitor
     */
    private $visitor;

    protected function setUp(): void
    {
        $this->visitor = new RoleVisitor();
    }

    /**
     * @dataProvider provideRoles
     * @param Role $role
     */
    public function testVisitSomeRole(Role $role): void
    {
        $role->accept($this->visitor);
        $this->assertSame($role, $this->visitor->getVisited()[0]);
    }

    public static function provideRoles(): array
    {
        return [
            [new User('Dominik')],
            [new Group('Administrators')],
        ];
    }
}
