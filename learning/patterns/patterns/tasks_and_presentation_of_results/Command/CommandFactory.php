<?php

namespace Command;

class CommandFactory {

    private static $dir = 'commands';

    public static function getCommand($action = 'Default') {
        if (preg_match('/\W/', $action)) {
            throw new \Exception("Недопустимые символы в команде");
        }

        $class = ucfirst(strtolower($action)) . "Command";
        $file = self::$dir . DIRECTORY_SEPARATOR . "{$class}.php";

        if (!file_exists(realpath(__DIR__) . "/" . $file)) {
            throw new CommandNotFoundException("Файл '{$file} не найден");
        }
        require_once realpath(__DIR__) . "/" . $file;

        $class = __NAMESPACE__ . "\\" . $class;
        if (!class_exists($class)) {
            throw new CommandNotFoundException("Файд '{$class} не обнаружен");
        }
        $cmd = new $class;
        return $cmd;
    }
}