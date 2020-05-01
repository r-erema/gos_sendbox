<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Service;

use other\ProjectManager\src\Model\User\Entity\Email;

interface IResetTokenSender
{
    public function send(Email $email, string $token): void;
}
