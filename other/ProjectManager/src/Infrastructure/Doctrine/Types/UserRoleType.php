<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;
use other\ProjectManager\src\Model\User\Entity\Email;
use other\ProjectManager\src\Model\User\Entity\Role;
use other\ProjectManager\src\Model\User\Entity\Status;
use Webmozart\Assert\Assert;

class UserRoleType extends AbstractEnumType
{
    protected static $choices = Role::ROLES;

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        Assert::isInstanceOf($value, Role::class);
        return parent::convertToDatabaseValue($value->getValue(), $platform);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return !empty($value) ? new Role($value) : null;
    }
}
