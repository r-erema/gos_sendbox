<?php

namespace Command;

class Controller {
    private $context;

    public function __construct() {
        $this->context = new CommandContext();
    }

    /**
     * @return mixed
     */
    public function getContext() {
        return $this->context;
    }

    public function process() {
        $action = $this->context->get('action');
        $action = is_null($action) ? 'default' : $action;
        $cmd = CommandFactory::getCommand($action);
        if (!$cmd->execute($this->context)) {
            return $f = 1;
            //Обработка ошибки
        } else {
            return $f = 2;
            //Все ок, отобразим результаты
        }
    }
}