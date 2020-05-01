<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\Role;

use other\ProjectManager\src\Model\User\Entity\Role;
use other\ProjectManager\src\Model\User\Exception\RoleIsAlreadySame;
use other\ProjectManager\tests\Builder\User\UserBuilder;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{

    public function testSuccess(): void
    {
        $user = (new UserBuilder())->viaEmail()->build();
        $user->setRole(Role::admin());
        $this->assertFalse($user->getRole()->isUser());
        $this->assertTrue($user->getRole()->isAdmin());
    }

    public function testAlready(): void
    {
        $user = (new UserBuilder())->viaEmail()->build();
        $this->expectException(RoleIsAlreadySame::class);
        $user->setRole(Role::user());
    }

}
