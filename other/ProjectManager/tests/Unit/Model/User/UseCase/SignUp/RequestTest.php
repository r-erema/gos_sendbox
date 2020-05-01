<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\SignUp;

use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\User;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class RequestTest extends TestCase
{

    public function testSuccess(): void
    {
        $user = User::signUpByEmail(
            $id = Uuid::uuid4(),
            $date = new DateTimeImmutable(),
            $email = new Email('test@test.test'),
            $hash = 'hash',
            $token = 'token'
        );

        $this->assertTrue($user->isWait());
        $this->assertFalse($user->isActive());

        $this->assertEquals($id, $user->getId());
        $this->assertEquals($date, $user->getDate());
        $this->assertEquals($email, $user->getEmail());
        $this->assertEquals($hash, $user->getPasswordHash());
        $this->assertEquals($token, $user->getConfirmToken());
        $this->assertTrue($user->getRole()->isUser());
    }
}
