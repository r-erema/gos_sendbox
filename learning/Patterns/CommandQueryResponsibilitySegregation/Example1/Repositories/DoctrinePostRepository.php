<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector\Projector;
use ReflectionException;

class DoctrinePostRepository extends EntityRepository implements PostRepository
{

    private $entityManager;

    /** @var Projector */
    private $projector;

    public function __construct(EntityManagerInterface $entityManager, ClassMetadata $metadata)
    {
        parent::__construct($entityManager, $metadata);
        $this->entityManager = $entityManager;
    }

    public function setProjector(Projector $projector): self
    {
        $this->projector = $projector;
        return $this;
    }

    /**
     * @param Post $post
     * @throws ReflectionException
     */
    public function save(Post $post): void
    {
        $this->entityManager->transactional(static function (EntityManagerInterface $em) use ($post) {
            $em->persist($post);

            /*foreach ($post->getRecordedEvents() as $event) {
                $em->persist($event);
            }*/
        });

        $this->projector->project($post->getRecordedEvents());
    }

    public function byId(PostId $id): ?Post
    {
        /** @var Post|null $post */
        $post = $this->entityManager->find(Post::class, $id);
        return $post;
    }


}