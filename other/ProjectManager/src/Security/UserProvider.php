<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Security;

use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Repository\IUserRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use function get_class;

class UserProvider implements UserProviderInterface
{
    private IUserRepository $users;

    public function __construct(IUserRepository $users)
    {
        $this->users = $users;
    }

    public function loadUserByUsername($username): UserInterface
    {
        $user = $this->loadUser($username);
        return self::identityByUser($user);
    }

    public function refreshUser(UserInterface $identity): UserInterface
    {
        if (!$identity instanceof UserIdentity) {
            throw new UnsupportedUserException('Invalid user class ' . get_class($identity));
        }

        $user = $this->loadUser($identity->getUsername());
        return self::identityByUser($user);
    }

    public function supportsClass($class): bool
    {
        return $class === UserIdentity::class;
    }

    private function loadUser(string $username): User
    {
        if ($user = $this->users->findByEmail(new Email($username))) {
            return $user;
        }

        throw new UsernameNotFoundException('');
    }

    private static function identityByUser(User $user): UserIdentity
    {
        return new UserIdentity(
            $user->getId()->toString(),
            $user->getEmail()->getValue(),
            $user->getPasswordHash(),
            $user->getRole()->getValue(),
            $user->getStatus()->getValue()
        );
    }
}
