<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Model\User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Webmozart\Assert\Assert;

class UserCollection extends ArrayCollection
{

    public function __construct(array $users = [])
    {
        Assert::allIsInstanceOf($users, User::class);
        parent::__construct($users);
    }

}
