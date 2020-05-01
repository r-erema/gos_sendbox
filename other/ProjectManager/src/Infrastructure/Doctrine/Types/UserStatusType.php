<?php

declare(strict_types=1);

namespace other\ProjectManager\src\Infrastructure\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;
use other\ProjectManager\src\Model\User\Entity\Status;
use Webmozart\Assert\Assert;

class UserStatusType extends AbstractEnumType
{
    protected static $choices = Status::STATUSES;

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        Assert::isInstanceOf($value, Status::class);
        return parent::convertToDatabaseValue($value->getValue(), $platform);
    }

}
