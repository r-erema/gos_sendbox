<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Doctrine\ORM\Mapping\ClassMetadata;
use other\ProjectManager\src\Model\User\Entity\Network;
use other\ProjectManager\src\Model\User\Entity\ResetToken;

/** @var ClassMetadata $metadata */

$metadata->setPrimaryTable(['name' => 'users']);

$metadata->mapField([
    'id' => true,
    'fieldName' => 'id',
    'type' => 'uuid'
]);

$metadata->mapField([
    'fieldName' => 'date',
    'type' => 'datetime_immutable'
]);

$metadata->mapField([
    'fieldName' => 'email',
    'type' => 'string',
    'length' => 254,
    'unique' => true,
    'nullable' => true
]);

$metadata->mapField([
    'fieldName' => 'passwordHash',
    'type' => 'string',
    'length' => 100,
    'nullable' => true
]);

$metadata->mapField([
    'fieldName' => 'confirmToken',
    'type' => 'string',
    'length' => 100,
    'nullable' => true
]);

$metadata->mapEmbedded([
    'fieldName' => 'resetToken',
    'class' => ResetToken::class,
    'columnPrefix' => 'reset_token_',
    'nullable' => true
]);

$metadata->mapField([
    'fieldName' => 'status',
    'type' => 'status_type'
]);

$metadata->mapOneToMany([
    'fieldName' => 'networks',
    'targetEntity' => Network::class,
    'mappedBy' => 'users',
    'cascade' => ['persist']
]);
