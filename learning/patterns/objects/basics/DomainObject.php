<?php

abstract class DomainObject {

    const GROUP = 'default';
    private $group;

    public function __construct() {
        $this->group = static::getGroup();
    }

    public static function create() {
        return new static();
    }

    public static function getGroup() {
        return 'default';
    }

}