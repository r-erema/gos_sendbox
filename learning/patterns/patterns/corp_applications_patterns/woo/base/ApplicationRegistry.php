<?php

namespace woo\base;
use woo\controller\Request;

class ApplicationRegistry extends Registry {

    /**
     * @var self
     */
    private static $instance;

    private $freezeDir;

    private $request;

    private $values = [];
    private $mTimes = [];

    /**
     * ApplicationRegistry constructor.
     * @throws ApplicationRegistryException
     */
    public function __construct() {
        $dir = __DIR__ . '/../';
        $this->freezeDir = realpath($dir) . '/data';
        if (!@mkdir($this->freezeDir) && !is_dir($this->freezeDir)) {
            throw new ApplicationRegistryException('Не удалось создать директорию');
        }

    }


    /**
     * @return ApplicationRegistry
     * @throws ApplicationRegistryException
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    protected function get($key) {
        $path = $this->freezeDir . DIRECTORY_SEPARATOR . $key;
        if (file_exists($path)) {
            clearstatcache();
            $mTime = filemtime($path);
            if (!isset($this->mTimes[$key])) {
                $this->mTimes[$key] = 0;
            }
            if ($mTime > $this->mTimes[$key]) {
                $data = file_get_contents($path);
                $this->mTimes[$key] = $mTime;
                return ($this->values[$key] = unserialize($data));
            }
        }
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }

    /**
     * @param $key
     * @param $value
     */
    protected function set($key, $value) {
        $this->values[$key] = $value;
        $path = $this->freezeDir . DIRECTORY_SEPARATOR . $key;
        file_put_contents($path, serialize($value));
        $this->mTimes[$key] = time();
    }

    /**
     * @return mixed|null
     * @throws ApplicationRegistryException
     */
    public static function getDSN() {
        return self::instance()->get('dsn');
    }

    /**
     * @param $dsn
     * @return mixed|void
     * @throws ApplicationRegistryException
     */
    public static function setDSN($dsn) {
        return self::instance()->set('dsn', $dsn);
    }

    /**
     * @return Request
     * @throws ApplicationRegistryException
     */
    public static function getRequest() {
        $inst = self::instance();
        if ($inst->request === null) {
            $inst->request = new Request();
        }
        return $inst->request;
    }
}