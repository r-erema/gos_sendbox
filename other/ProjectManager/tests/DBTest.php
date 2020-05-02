<?php

declare(strict_types=1);

namespace other\ProjectManager\tests;

use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use other\ProjectManager\src\Model\User\Entity\Network;
use other\ProjectManager\src\Model\User\Entity\User;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DBTest extends KernelTestCase
{

    public function testDB(): void
    {
        $kernel = self::bootKernel();

        /** @var EntityManagerInterface $em */
        $em = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $repo = $em->getRepository(User::class);

        $user = User::signUpByNetwork(
            Uuid::uuid4(),
            new DateTimeImmutable(),
            Network::NETWORK_GOOGLE,
            '001'
        );
        $em->persist($user);
        $em->flush();

        $users = $repo->findAll();

        $this->assertGreaterThan(0, $users);
    }
}
