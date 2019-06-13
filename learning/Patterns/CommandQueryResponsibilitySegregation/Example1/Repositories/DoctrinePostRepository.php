<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector\Projector;

class DoctrinePostRepository implements PostRepository
{

    private $entityManager;
    private $projector;

    public function __construct(EntityManagerInterface $entityManager, Projector $projector)
    {
        $this->entityManager = $entityManager;
        $this->projector = $projector;
    }

    public function save(Post $post): void
    {
        $this->entityManager->transactional(static function (EntityManagerInterface $em) use ($post) {
            $em->persist($post);

            foreach ($post->getRecordedEvents() as $event) {
                $em->persist($event);
            }
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