<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1;

class Post extends AggregateRoot
{

    private $id;
    private $title;
    private $content;
    private $published = false;
    private $categories = [];

    private function __construct(PostId $id)
    {
        $this->id = $id;
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