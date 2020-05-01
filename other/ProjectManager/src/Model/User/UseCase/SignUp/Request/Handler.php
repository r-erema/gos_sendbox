<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\SignUp\Request;

use DateTimeImmutable;
use DomainException;
use IFlusher;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Id;
use other\ProjectManager\src\Model\User\Entity\IUserRepository;
use other\ProjectManager\src\Model\User\Entity\User;
use other\ProjectManager\src\Model\User\Service\ConfirmTokenizer;
use other\ProjectManager\src\Model\User\Service\IConfirmTokenSender;
use other\ProjectManager\src\Model\User\Service\PasswordHasher;
use Ramsey\Uuid\Guid\Guid;
use Ramsey\Uuid\Uuid;

class Handler
{

    private IUserRepository $users;
    private IFlusher $flusher;
    private IConfirmTokenSender $tokenSender;

    public function __construct(IUserRepository $userRepository, IFlusher $flusher, IConfirmTokenSender $tokenSender)
    {
        $this->users = $userRepository;
        $this->flusher = $flusher;
        $this->tokenSender = $tokenSender;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->getEmail());

        if ($this->users->hasByEmail($email)) {
            throw new DomainException('User already exists');
        }

        $user = User::signUpByEmail(
            Uuid::getFactory()->uuid4(),
            new DateTimeImmutable(),
            new Email($command->getEmail()),
            PasswordHasher::hash($command->getPassword()),
            $token = ConfirmTokenizer::generate()
        );

        $this->users->add($user);
        $this->tokenSender->send($email, $token);
        $this->flusher->flush();
    }
}
