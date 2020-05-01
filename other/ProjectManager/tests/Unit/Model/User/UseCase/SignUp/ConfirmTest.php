<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\SignUp;

use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Exception\UserAlreadySignedUp;
use other\ProjectManager\tests\Builder\User\UserBuilder;
use PHPUnit\Framework\TestCase;

class ConfirmTest extends TestCase
{

    public function testSuccess(): void
    {
        $user = (new UserBuilder())->viaEmail()->build();

        $user->confirmSignUp();

        $this->assertFalse($user->isWait());
        $this->assertTrue($user->isActive());
        $this->assertNull($user->getConfirmToken());
    }

    public function testAlready(): void
    {
        $user = (new UserBuilder())->viaEmail()->build();

        $user->confirmSignUp();
        $this->expectException(UserAlreadySignedUp::class);
        $user->confirmSignUp();
    }

}
