<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\Reset;

use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\ResetToken;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Exception\ResettingAlreadyRequested;
use other\ProjectManager\tests\Builder\User\UserBuilder;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
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
    }

    public function testAlready(): void
    {
        $now = new DateTimeImmutable();
        $token = new ResetToken('token', $now->modify('+1 day'));
        $this->user->requestPasswordReset($token, $now);
        $this->expectException(ResettingAlreadyRequested::class);
        $this->user->requestPasswordReset($token, $now);
    }

    public function testExpired(): void
    {
        $now = new DateTimeImmutable();

        $token1 = new ResetToken('token', $now->modify('+1 day'));
        $this->user->requestPasswordReset($token1, $now);
        $this->assertEquals($token1, $this->user->getResetToken());

        $token2 = new ResetToken('token', $now->modify( '+3 day'));
        $this->user->requestPasswordReset($token2, $now->modify('+2 day'));
        $this->assertEquals($token2, $this->user->getResetToken());
    }


}
