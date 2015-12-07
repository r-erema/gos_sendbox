<?php

namespace learning\patterns\patterns\object_generation\classes;

abstract class Employee {

    protected $name;

    private static $types = ['Minion', 'CluedUp', 'WellConnected'];

    public static function recruit($name) {
        $num = rand(1, count(self::$types)) - 1;
        $class = self::$types[$num];;
        $class = __NAMESPACE__ . '\\' . $class;
        return new $class($name);
    }

    /**
     * Employee constructor.
     * @param $name
     */
    public function __construct($name) {
        $this->name = $name;
    }

    abstract function fire();
}