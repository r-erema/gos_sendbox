<?php

namespace woo\base;

/**
 * Class Registry
 * @package woo\base
 */
abstract class Registry {
    /**
     * @param $key
     * @return mixed
     */
    abstract protected function get($key);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    abstract protected function set($key, $value);
}