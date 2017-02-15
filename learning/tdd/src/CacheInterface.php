<?php
namespace src;

interface CacheInterface {

    /**
     * @abstract
     * @param $id
     * @param $data
     * @return bool
     */
    public function save($id, $data) : bool;

    /**
     * @abstract
     * @param $id
     * @return mixed
     */
    public function load($id);
}