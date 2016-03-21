<?php

namespace woo\controller;

class ControllerMap {

    private $viewMap = [];
    private $forwardMap = [];
    private $classRootMap = [];

    /**
     * @param $command
     * @param $classRoot
     */
    public function addClassRoot($command, $classRoot) {
        $this->classRootMap[$command] = $classRoot;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function getClassRoot($command) {
        if (isset($this->classRootMap[$command])) {
            return $this->classRootMap[$command];
        }
        return null;
    }

    /**
     * @param $view
     * @param string $command
     * @param int $status
     */
    public function addView($view, $command = 'default', $status = 0) {
        $this->viewMap[$command][$status] = $view;
    }

    /**
     * @param $command
     * @param $status
     * @return null
     */
    public function getView($command, $status) {
        if (isset($this->viewMap[$command][$status])) {
            return $this->viewMap[$command][$status];
        }
        return null;
    }

    /**
     * @param $command
     * @param $status
     * @return null
     */
    public function getForward($command, $status) {
        if (isset($this->forwardMap[$command][$status])) {
            return $this->forwardMap[$command][$status];
        }
        return null;
    }


}