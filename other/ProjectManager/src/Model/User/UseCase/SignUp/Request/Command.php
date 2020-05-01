<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\UseCase\SignUp\Request;

class Command
{
    private string $email;
    private string $password;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}
