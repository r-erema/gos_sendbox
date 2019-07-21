<?php

declare(strict_types=1);

namespace learning\Doctrine\PersistentCollection\Example1\Tests;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Tools\Setup;
use learning\Doctrine\PersistentCollection\Example1\Entities\Author;
use learning\Doctrine\PersistentCollection\Example1\Entities\Book;
use PHPUnit\Framework\TestCase;

class PersistentCollectionTest extends TestCase
{

    /** @var EntityManagerInterface */
    private EntityManagerInterface $entityManager;

    /**
     * @throws DBALException
     * @throws ORMException
     */
    public function setUp(): void
    {

        $config = Setup::createConfiguration();
        $config->setMetadataDriverImpl(new PHPDriver(__DIR__ . '/../Infrastructure/Doctrine/mapping'));
        $this->entityManager = EntityManager::create([
            'driver' => 'pdo_sqlite',
            'memory' => true
        ], $config);

        $this->entityManager->getConnection()->exec(file_get_contents(__DIR__ . '/init.sql'));
    }

    public function testPersistentCollection(): void
    {
        $book = $this->entityManager->find(Book::class, 2);
        $sourceAuthorsCount = $book->getAuthors()->count();

        $authorToRemove = $book->getAuthors()->get(1);
        $book->getAuthors()->removeElement($authorToRemove);

        $this->entityManager->flush();

        $this->entityManager->clear();
        $book = $this->entityManager->find(Book::class, 2);
        $newAuthorsCount = $book->getAuthors()->count();

        self::assertEquals($sourceAuthorsCount - 1, $newAuthorsCount);
    }

}