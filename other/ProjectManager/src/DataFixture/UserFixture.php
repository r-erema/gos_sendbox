<?php

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
    public const REFERENCE_ADMIN = 'user_user_admin';
    public const REFERENCE_USER = 'user_user_user';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $hash = PasswordHasher::hash('password');

        $requested = $this->createSignUpRequestedByEmail(
            new Email('requested@app.test'),
            $hash
        );
        $manager->persist($requested);

        $confirmed = $this->createSignUpConfirmedByEmail(new Email('user@app.test'), $hash);
        $manager->persist($confirmed);
        $this->setReference(self::REFERENCE_USER, $confirmed);

        $admin = $this->createAdminByEmail(new Email('admin@app.test'), $hash);
        $manager->persist($admin);
        $this->setReference(self::REFERENCE_ADMIN, $admin);

        $manager->flush();
    }

    private function createAdminByEmail(Email $email, string $hash): User
    {
        $user = $this->createSignUpConfirmedByEmail($email, $hash);
        $user->setRole(Role::admin());
        return $user;
    }

    private function createSignUpConfirmedByEmail(Email $email, string $hash): User
    {
        $user = $this->createSignUpRequestedByEmail($email, $hash);
        $user->confirmSignUp();
        return $user;
    }

    private function createSignUpRequestedByEmail(Email $email, string $hash): User
    {
        return User::signUpByEmail(
            Uuid::uuid4(),
            new DateTimeImmutable(),
            $email,
            $hash,
            'token'
        );
    }
}
