<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities;

use Doctrine\Common\Collections\ArrayCollection;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\AggregateRoot;
use Doctrine\ORM\Mapping as ORM;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostContentWasChanged;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostTitleWasChanged;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCategorized;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCreated;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasPublished;

/**
 * @ORM\Entity()
 * @ORM\MappedSuperclass
 * @ORM\Table(name="posts")
 */
class Post extends AggregateRoot
{

    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $published = false;

    /**
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="posts_categories",
     *      joinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")}
     * )
     */
    private $categories;

    private function __construct(PostId $id)
    {
        $this->id = $id;
        $this->categories = new ArrayCollection();
    }

    public static function writeNewFrom(string $title, string $content): void
    {
        $post = new self(PostId::create());
        $post->recordApplyAndPublishThat(
            new PostWasCreated(PostId::generate(), $title, $content)
        );
    }

    public function publish(): void
    {
        $this->recordApplyAndPublishThat(
            new PostWasPublished($this->id)
        );
    }

    public function categorizeIn(CategoryId $categoryId): void
    {
        $this->recordApplyAndPublishThat(
            new PostWasCategorized($this->id, $categoryId)
        );
    }

    public function changeContentFor(string $newContent): void
    {
        $this->recordApplyAndPublishThat(
            new PostContentWasChanged($this->id, $newContent)
        );
    }

    public function changeTitleFor(string $title): void
    {
        $this->recordApplyAndPublishThat(
            new PostTitleWasChanged($this->id, $title)
        );
    }

    protected function applyPostWasCreated(PostWasCreated $event): void
    {
        $this->id = $event->getPostId();
        $this->title = $event->getTitle();
        $this->content = $event->getContent();
    }

    protected function applyPostWasPublished(): void
    {
        $this->published = true;
    }

    protected function applyPostWasCategorized(PostWasCategorized $event): void
    {
        $this->categories[] = $event->getCategoryId();
    }

    protected function applyPostContentWasChanged(PostContentWasChanged $event): void
    {
        $this->content = $event->getContent();
    }

    protected function applyPostTitleWasChanged(PostTitleWasChanged $event): void
    {
        $this->title = $event->getTitle();
    }
}