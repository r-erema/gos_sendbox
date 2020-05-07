<?php

declare(strict_types=1);

namespace other\ProjectManager\src\DataFixture;

use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Role;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Service\PasswordHasher;
use Ramsey\Uuid\Uuid;

class UserFixture extends Fixture
{
    public const PASSWORD = '111111';
    public const SIMPLE_USER_ACTIVE_EMAIL = 'user_actvie@test.test';
    public const SIMPLE_USER_NOT_ACTIVE_EMAIL = 'user_not_active@test.test';
    public const ADMIN_EMAIL = 'admin@test.test';

    public function load(ObjectManager $manager): void
    {
        $notActiveSimpleUser = self::createUser(self::SIMPLE_USER_NOT_ACTIVE_EMAIL, false, false);
        $activeSimpleUser = self::createUser(self::SIMPLE_USER_ACTIVE_EMAIL);
        $admin = self::createUser(self::ADMIN_EMAIL, true);
        $manager->persist($notActiveSimpleUser);
        $manager->persist($activeSimpleUser);
        $manager->persist($admin);
        $manager->flush();
    }

    private static function createUser(string $email, bool $isAdmin = false, bool $autoConfirm = true): User
    {
        $user = User::signUpByEmail(
            Uuid::uuid4(),
            new DateTimeImmutable(),
            new Email($email),
            PasswordHasher::hash(self::PASSWORD),
            'token'
        );
        if ($isAdmin) {
            $user->setRole(Role::admin());
        }
        if ($autoConfirm) {
            $user->confirmSignUp();
        }
        return $user;
    }
}
