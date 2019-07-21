<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Doctrine\ORM\Mapping\ClassMetadata;
use learning\Doctrine\PersistentCollection\Example1\Entities\Author;

/** @var ClassMetadata $metadata */

$metadata->setPrimaryTable(['name' => 'authors']);

$metadata->mapField([
    'id' => true,
    'fieldName' => 'id',
    'type' => 'integer'
]);
$metadata->mapField([
    'fieldName' => 'name',
    'type' => 'string',
]);
$metadata->mapManyToMany([
    'fieldName' => 'books',
    'targetEntity' => Book::class,
    'joinTable' => ['name' => 'books_have_authors'],
    'joinColumns' => [
        'name' => 'author_id',
        'referencedColumnName' => 'id'
    ],
    'inverseJoinColumns' => [
        'name' => 'book_id',
        'referencedColumnName' => 'id'
    ]
]);