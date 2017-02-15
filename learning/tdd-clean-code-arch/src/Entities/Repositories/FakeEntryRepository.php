<?php

namespace src\Entities\Repositories;

use src\Entities\Entry;
use src\Entities\Repositories\EntryRepository;

class FakeEntryRepository implements EntryRepository {

    /**
     * @var Entry[]
     */
    private $entries = [];

    /**
     * FakeEntryRepository constructor.
     * @param Entry[] $entries
     */
    public function __construct(array $entries = []) {
        $this->entries = $entries;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return Entry []
     */
    public function findAllPaginated(int $offset, int $limit): array {
        return array_slice($this->entries, $offset, $limit);
    }
}