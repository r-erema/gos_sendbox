<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Doctrine\ORM\Mapping\ClassMetadata;
use learning\Doctrine\PersistentCollection\Example1\Entities\Author;

/** @var ClassMetadata $metadata */

$metadata->setPrimaryTable(['name' => 'books']);

$metadata->mapField([
    'id' => true,
    'fieldName' => 'id',
    'type' => 'integer'
]);
$metadata->mapField([
    'fieldName' => 'title',
    'type' => 'string',
]);
$metadata->mapManyToMany([
    'fieldName' => 'authors',
    'targetEntity' => Author::class,
    'joinTable' => ['name' => 'books_have_authors'],
    'joinColumns' => [
        'name' => 'book_id',
        'referencedColumnName' => 'id'
    ],
    'inverseJoinColumns' => [
        'name' => 'author_id',
        'referencedColumnName' => 'id'
    ]
]);