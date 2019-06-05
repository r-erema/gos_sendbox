<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Tests;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Controllers\PostsController;
use PHPUnit\Framework\TestCase;

class CQRSTest extends TestCase
{

    private $entityManager;

    /**
     * @throws DBALException
     * @throws ORMException
     */
    public function setUp(): void
    {
        $config = Setup::createAnnotationMetadataConfiguration(['../Entities/'], false, null, null, false);
        $this->entityManager = EntityManager::create([
            'driver' => 'pdo_sqlite',
            'memory' => true
        ], $config);

        $queries = [

            'CREATE TABLE IF NOT EXISTS posts (
                id VARCHAR(100) NOT NULL,
                title VARCHAR(100) NOT NULL,
                content TEXT NOT NULL,
                published INTEGER
            );',

            'CREATE TABLE IF NOT EXISTS single_post_with_comments (
                id INTEGER NOT NULL,
                post_id INTEGER NOT NULL,
                post_title VARCHAR(100) NOT NULL,
                post_content TEXT NOT NULL,
                post_created_at DATETIME NOT NULL,
                comment_content TEXT NOT NULL
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                1,1, "Layered architecture", "Lorem ipsum dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet, ..."
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                2, 1, "Layered architecture", "Lorem ipsum\ dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet, ..."
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                3, 2, "Hexagonal architecture", "Lorem ips\ um dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet, ..."
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                4, 2, "Hexagonal architecture", "Lorem ips\ um dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet, ..."
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                5, 3, "Command - Query Responsability Segg\ regation", "Lorem ipsum dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet\, ..."
            );',

            'INSERT INTO single_post_with_comments
            (id, post_id, post_title, post_content, post_created_at, comment_content)
            VALUES (
                6, 3, "Command - Query Responsability Segg\ regation", "Lorem ipsum dolor sit amet, ...", datetime(), "Lorem ipsum dolor sit amet\
            , ...");'

        ];
        $this->entityManager->getConnection()->exec(implode('', $queries));
    }

    public function testCQRS(): void
    {
        $controller = new PostsController();
        self::assertInstanceOf(PostsController::class, $controller);
    }
}