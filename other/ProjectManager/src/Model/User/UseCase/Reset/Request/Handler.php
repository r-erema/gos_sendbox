<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\Reset\Request;

use IFlusher;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\IUserRepository;
use other\ProjectManager\src\Model\User\Service\IResetTokenSender;
use other\ProjectManager\src\Model\User\Service\ResetTokenizer;

class Handler
{
    private IUserRepository $users;
    private IFlusher $flusher;
    private ResetTokenizer $tokenizer;
    private IResetTokenSender $tokenSender;

    public function __construct(
        IUserRepository $users,
        IFlusher $flusher,
        ResetTokenizer $tokenizer,
        IResetTokenSender $tokenSender
    )
    {
        $this->users = $users;
        $this->flusher = $flusher;
        $this->tokenizer = $tokenizer;
        $this->tokenSender = $tokenSender;
    }

    public function handle(Command $command): void
    {
        $user = $this->users->getByEmail(new Email($command->getEmail()));

        $user->requestPasswordReset($this->tokenizer->generate());

        $this->flusher->flush();
        $this->tokenSender->send($user->getEmail(), $user->getResetToken());
    }

}
