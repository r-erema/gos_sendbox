<?php

namespace learning\Patterns\ServiceLocator\Example2;

use Exception;

class FileStorage
{

    const DEFAULT_STORAGE_FILE =  __DIR__ . '/data.dat';

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @var string
     */
    protected $file;

    public function __construct(ServiceLocatorInterface $locator, string $file = self::DEFAULT_STORAGE_FILE)
    {
        $this->setFile($file);
        $this->serializer = $locator->get("serializer");
    }

    /**
     * @param string $file
     * @return $this
     */
    public function setFile(string $file)
    {
        if (!is_file($file)) {
            throw new \InvalidArgumentException("The file {$file} does not exist.");
        }
        if (!is_readable($file) || !is_writable($file)) {
            if (!chmod($file, 0644)) {
                throw new \InvalidArgumentException("The file {$file} is not readable or writable.");
            }
        }
        $this->file = $file;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function read()
    {
        try {
            return $this->serializer->unserialize(@file_get_contents($this->file));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param string $data
     * @return bool|int
     * @throws Exception
     */
    public function write(string $data) {
        try {
            return file_put_contents($this->file, $this->serializer->serialize($data));
        }
        catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}