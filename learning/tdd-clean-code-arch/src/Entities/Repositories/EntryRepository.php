<?php
namespace src\Entities\Repositories;

interface EntryRepository {

    /**
     * @param $offset
     * @param $limit
     * @return array
     */
    public function findAllPaginated(int $offset, int $limit) : array;

}