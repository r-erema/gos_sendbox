<?php

declare(strict_types=1);

namespace other\ProjectManager\tests\Unit\Model\User\UseCase\Network;

use DateTimeImmutable;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\Network;
use other\ProjectManager\src\Model\User\Entity\User;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class AuthTest extends TestCase
{

    public function testSuccess(): void
    {
        $user = User::signUpByNetwork(
            $id = Uuid::uuid4(),
            $date = new DateTimeImmutable(),
            Network::NETWORK_GOOGLE,
            '0000011'
        );

        $this->assertTrue($user->isActive());
        $this->assertCount(1, $networks = $user->getNetworksArray());
        $this->assertInstanceOf(Network::class, $first = reset($networks));
        $this->assertTrue($user->getRole()->isUser());
    }

}
