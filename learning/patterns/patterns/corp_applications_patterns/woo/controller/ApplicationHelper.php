<?php


namespace woo\controller;

use woo\base\AppException;
use woo\base\ApplicationRegistry;
use woo\command\Command;

class ApplicationHelper {


    private static $instance;
    private $config = 'data/woo_options.xml';

    /**
     * ApplicationHelper constructor.
     */
    private function __construct() {}

    /**
     * @return ApplicationHelper
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function init() {
        $dsn = ApplicationRegistry::getDSN();
        if ($dsn !== null) {
            return;
        }
        $this->getOptions();
    }

    /**
     * @throws AppException
     */
    private function getOptions() {
        $this->ensure(file_exists($this->config), 'Файл конфигурации не найден');
        $options = @simplexml_load_file($this->config);
        $dsn = (string) $options->dsn;
        $this->ensure($options instanceof \SimpleXMLElement, 'Файл конфигурции непригоден');
        $this->ensure($dsn, 'DSN не найден');
        ApplicationRegistry::setDSN($dsn);

        $map = new ControllerMap();

        foreach ($options->control->view as $defaultView) {
            $statStr = trim($defaultView['status']);
            $status = Command::statuses($statStr);
            $map->addView((string) $defaultView, 'default', $status);
        }

        ApplicationRegistry::setControllerMap($map);

    }

    /**
     * @param $expr
     * @param $message
     * @throws AppException
     */
    private function ensure($expr, $message) {
        if (!$expr) {
            throw new AppException($message);
        }
    }

}