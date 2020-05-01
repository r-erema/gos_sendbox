<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\Reset;

use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\ResetToken;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Exception\ResettingAlreadyRequested;
use other\ProjectManager\src\Model\User\Exception\ResettingNotRequested;
use other\ProjectManager\src\Model\User\Exception\ResetTokenExpired;
use other\ProjectManager\tests\Builder\User\UserBuilder;
use PHPUnit\Framework\TestCase;

class ResetTest extends TestCase
{

    private User $user;

    public function setUp(): void
    {
        $this->user = (new UserBuilder())->viaEmail()->build();
        $this->user->confirmSignUp();
    }

    public function testSuccess(): void
    {
        $now = new DateTimeImmutable();
        $token = new ResetToken('token', $now->modify('+1 day'));
        $this->user->requestPasswordReset($token, $now);
        $this->assertNotNull($this->user->getResetToken());
        $this->user->passwordReset($now, $hash = 'hash');
        $this->assertNull($this->user->getResetToken());
        $this->assertEquals($hash, $this->user->getPasswordHash());
    }

    public function testExpiredToken(): void
    {
        $now = new DateTimeImmutable();
        $token = new ResetToken('token', $now);
        $this->user->requestPasswordReset($token, $now);
        $this->expectException(ResetTokenExpired::class);
        $this->user->passwordReset($now->modify('+1 day'), 'hash');
    }

    public function testNotRequested(): void
    {
        $now = new DateTimeImmutable();
        $this->expectException(ResettingNotRequested::class);
        $this->user->passwordReset($now, 'hash');
    }

}
