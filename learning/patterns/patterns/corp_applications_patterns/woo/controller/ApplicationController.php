<?php

namespace woo\controller;
use woo\base\AppException;
use woo\command\Command;
use woo\command\DefaultCommand;

/**
 * Class ApplicationController
 * @package woo\command
 * 
 */
class ApplicationController {

    private static $baseCmd;
    private static $defaultCmd;

    /**
     * @var ControllerMap
     */
    private $controllerMap;
    private $invoked = [];

    /**
     * ApplicationController constructor.
     * @param ControllerMap $controllerMap
     */
    public function __construct(ControllerMap $controllerMap) {
        $this->controllerMap = $controllerMap;
        if (self::$baseCmd === null) {
            self::$baseCmd = new \ReflectionClass('\woo\command\Command');
            self::$defaultCmd = new DefaultCommand();
        }
    }

    public function reset() {
        $this->invoked = [];
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getView(Request $request) {
        $view = $this->getResource($request, 'View');
        return $view;
    }

    /**
     * @param Request $request
     * @param $res
     * @return mixed
     */
    private function getResource(Request $request, $res) {
        $cmdStr = $request->getProperty('cmd');
        $previous = $request->getLastCommand();
        $status = $previous->getStatus();

        if (!isset($status) || !is_int($status)) {
            $status = 0;
        }

        $acquire = "get{$res}";
        $resource = $this->controllerMap->$acquire($cmdStr, $status);

        if ($resource === null) {
            $resource = $this->controllerMap->$acquire('default', $status);
        }

        if ($resource === null) {
            $resource = $this->controllerMap->$acquire('default', 0);
        }

        return $resource;

    }

    /**
     * @param Request $request
     * @return mixed|null|DefaultCommand
     * @throws AppException
     */
    public function getCommand(Request $request) {
        $previous = $request->getLastCommand();
        if (!$previous) {
            $cmd = $request->getProperty('cmd');
            if ($cmd === null) {
                $request->setProperty('cmd', 'default');
                return self::$defaultCmd;
            }
        } else {
            $cmd = $this->getForward($request);
            if ($cmd === null) {
                return null;
            }
        }

        $cmdObj = $this->resolveCommand($cmd);
        if ($cmdObj === null) {
            throw new AppException("Команда {$cmd} не найдена");
        }
        $cmdClass = get_class($cmdObj);
        if (isset($this->invoked[$cmdClass])) {
            throw new AppException("Циклический вызов");
        }

        $this->invoked[$cmdClass] = 1;
        return $cmdObj;
    }

    /**
     * @param Request $request
     * @return Command;
     */
    private function getForward(Request $request) {

    }

    /**
     * @param Command $cmd
     * @return mixed;
     */
    private function resolveCommand(Command $cmd) {
        $classRoot = $this->controllerMap->getClassRoot($cmd);
        $filePath = "woo/command/{$classRoot}.php";
        $className = "\\woo\\command\\{$classRoot}";
        if (file_exists($filePath)) {
            require_once $filePath;
            if (class_exists($className)) {
                $cmdClass = new \ReflectionClass($className);
                if ($cmdClass->isSubclassOf(self::$baseCmd)) {
                    return $cmdClass->newInstance();
                }
            }
        }
        return null;
    }

}