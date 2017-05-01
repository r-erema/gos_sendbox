<?php

class Registry {

    private static $_register = [];

    public static function add(&$item, $name = null) {
        if (is_object($item) && $name === null) {
            $name = get_class($item);
        } elseif($name === null) {
            throw new Exception('You must provide a name for non-objects');
        }
        $name = strtolower($name);
        self::$_register[$name] = $item;

    }

    public static function &get($name) {
        $name = strtolower($name);
        if (array_key_exists($name, self::$_register)) {
            return self::$_register[$name];
        } else {
            throw new Exception("{$name} is not registered");
        }
    }

    public static function exists($name) {
        $name = strtolower($name);
        return array_key_exists($name, self::$_register);
    }

}

$std = new stdClass();
Registry::add($std, 'std');
if (Registry::exists('std')) {
    $std = Registry::get('std');
} else {
    die('std not exists');
}