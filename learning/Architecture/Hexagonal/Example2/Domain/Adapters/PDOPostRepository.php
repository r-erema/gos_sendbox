<?php

declare(strict_types=1);

namespace learning\Architecture\Hexagonal\Example2\Domain\Adapters;

use learning\Architecture\Hexagonal\Example2\Domain\Entities\Post,
    learning\Architecture\Hexagonal\Example2\Domain\Entities\PostId,
    learning\Architecture\Hexagonal\Example2\Domain\Ports\PostRepository,
    PDO;

class PDOPostRepository implements PostRepository
{

    private $db;

    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function byId(PostId $id): Post
    {
        $stmt = $this->db->prepare('SELECT * FROM posts WHERE id = ?');
        $stmt->execute([$id->getValue()]);
        return Post::recreateFrom($stmt->fetch());
    }

    public function add(Post $post): void
    {
        $stmt = $this->db->prepare('INSERT INTO posts (title, content) VALUES (?, ?)');
        $stmt->execute([$post->getTitle(), $post->getContent()]);
    }


}