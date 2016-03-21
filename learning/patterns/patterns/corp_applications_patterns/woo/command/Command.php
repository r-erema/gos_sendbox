<?php

namespace woo\command;
use woo\base\AppException;
use woo\controller\Request;

/**
 * Class Command
 * @package woo\command
 */
abstract class Command {

    private static $STATUS_STRINGS = [
        'CMD_DEFAULT' => 0,
        'CMD_OK' => 1,
        'CMD_ERROR' => 2,
        'CMD_INSUFFICIENT_DATA' => 3
    ];

    private $status;

    final public function __construct() {}

    /**
     * @param $request
     */
    public function execute(Request $request) {
        $this->status = $this->doExecute($request);
        $request->setCommand($this);
    }

    /**
     * @param $statString
     * @return mixed
     * @throws AppException
     */
    public static function statuses($statString) {
        if (isset(self::$STATUS_STRINGS[$statString])) {
            return self::$STATUS_STRINGS[$statString];
        }
        throw new AppException("Неизвестный код состояния {$statString}");
    }

    public function getStatus() {
        return $this->status;
    }

    abstract public function doExecute(Request $request);

}