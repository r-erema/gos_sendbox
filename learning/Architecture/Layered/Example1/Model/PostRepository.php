<?php

declare(strict_types=1);

namespace learning\Architecture\Layered\Example1\Model;

use Exception,
    PDO,
    learning\Architecture\Layered\Example1\Model\Exceptions\UnableToCreatePostException;

class PostRepository
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('sqlite::memory:', null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $this->db->exec('
            CREATE TABLE IF NOT EXISTS posts (
              title VARCHAR(255) NOT NULL,
              content TEXT NOT NULL
            );
        ');
    }

    /**
     * @param Post $post
     * @throws UnableToCreatePostException
     */
    public function add(Post $post): void
    {
        $this->db->beginTransaction();

        try {
            $stmt = $this->db->prepare(
                'INSERT INTO posts (title, content) VALUES (?, ?)'
            );
            $stmt->execute([
                $post->getTitle(),
                $post->getContent()
            ]);

            $this->db->commit();
        } catch (Exception $e) {
            $this->db->rollBack();
            throw new UnableToCreatePostException($e);
        }
    }

}