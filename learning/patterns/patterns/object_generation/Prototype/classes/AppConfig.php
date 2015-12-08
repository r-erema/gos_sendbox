<?php

class AppConfig {

    /**
     * @var self
     */
    private static $instance;

    /**
     * @var CommsManager
     */
    private $commsManager;

    /**
     * @return AppConfig
     */
    public static function getInstance() {
        if(!self::$instance instanceof self) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->init();
    }

    private function init() {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = new BloggsCommsManager();
        }
    }

    /**
     * @return CommsManager
     */
    public function getCommsManager() {
        return $this->commsManager;
    }
}