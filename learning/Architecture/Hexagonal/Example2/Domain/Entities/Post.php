<?php /** @noinspection PhpUndefinedClassInspection */

declare(strict_types=1);

namespace learning\Architecture\Hexagonal\Example2\Domain\Entities;

use Webmozart\Assert\Assert;

class Post
{

    private $title,
            $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function writeNewFrom(string $title, string $content): self
    {
        return new static($title, $content);
    }

    public static function recreateFrom(array $data): self
    {
        return new static($data['title'], $data['content']);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        Assert::notEmpty($title);
        $this->title = $title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        Assert::notEmpty($content);
        $this->content = $content;
    }

}