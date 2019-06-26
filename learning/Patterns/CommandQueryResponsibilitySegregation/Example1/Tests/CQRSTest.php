<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Tests;

use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Controllers\PostsController;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector\Projector;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories\DoctrinePostRepository;
use PHPUnit\Framework\TestCase;

class CQRSTest extends TestCase
{

    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var DoctrinePostRepository */
    private $postRepository;

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
        $this->entityManager->getConnection()->exec(file_get_contents(__DIR__ . '/init.sql'));
        $this->postRepository = $this->entityManager->getRepository(Post::class);
        $this->postRepository->setProjector(new Projector($this->entityManager));
    }

    public function testCreatePost(): void
    {

        $controller = new PostsController($this->postRepository);
        $controller->createPost(
            'What is Lorem Ipsum?',
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
        );
        $this->assertNotEmpty($this->postRepository->findAll());
    }
}