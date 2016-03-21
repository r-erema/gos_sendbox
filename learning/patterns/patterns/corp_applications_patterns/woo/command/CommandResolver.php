<?php

namespace woo\command;
use woo\controller\Request;

/**
 * Class CommandResolver
 * @package woo\command
 */
class CommandResolver {

    /**
     * @var \ReflectionClass
     */
    private static $base_cmd;

    /**
     * @var DefaultCommand
     */
    private static $default_cmd;

    /**
     * CommandResolver constructor.
     */
    public function __construct() {
        if (self::$base_cmd === null) {
            self::$base_cmd = new \ReflectionClass('\woo\command\Command');
            self::$default_cmd = new DefaultCommand();
        }
    }


    /**
     * @param Request $request
     * @return object|DefaultCommand
     */
    public function getCommand(Request $request) {
        $cmd = $request->getProperty('cmd');
        $sep = DIRECTORY_SEPARATOR;
        if (!$cmd) {
            return self::$default_cmd;
        }
        $cmd = str_replace(['.', $sep], '', $cmd);
        $filePath = "woo{$sep}command{$sep}{$cmd}.php";
        $className = "woo\\command\\{$cmd}";

        if (file_exists($filePath)) {
            require_once ($filePath);
            if (class_exists($className)) {
                $cmd_class = new \ReflectionClass($className);
                if ($cmd_class->isSubclassOf(self::$base_cmd)) {
                    return $cmd_class->newInstance();
                } else {
                    $request->addFeedback("������ Command ������� '{$cmd}' �� ������");
                }
            }
        }
        $request->addFeedback("������� '{$cmd}' �� �������");
        return clone self::$default_cmd;
    }

}