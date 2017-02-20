<?php

namespace FileManager;

use PHPUnit\Framework\Exception;

class FileManager implements IFileManager {

    /**
     * @var IFileDataObject
     */
    public $fileDataObject;

    /**
     * FileManager constructor.
     */
/*    public function __construct() {
        $this->fileDataObject = FactoryClass::CreateDataAccessObject();
    }*/

    /**
     * FileManager constructor.
     * @param IFileDataObject $fileDataObject
     */
    public function __construct(IFileDataObject $fileDataObject) {
        $this->fileDataObject = $fileDataObject;
    }


    /**
     * @return IFileDataObject
     */
    protected static function localFactoryMethod(): IFileDataObject {
        return new FileDataObject();
    }


    /**
     * @param IFileDataObject $object
     */
    public function setFileDataAccessObject(IFileDataObject $object) {
        $this->fileDataObject = $object;
    }

    /**
     * @return IFileDataObject
     */
    public function getFileDataAccessObject() {
        if ($this->fileDataObject === null) {
            throw new Exception('Data access object has not been initialized');
        } else {
            return $this->fileDataObject;
        }
    }


    /**
     * @param string $fileName
     * @return bool
     */
    public function findLogFile(string $fileName/*, IFileDataObject $fdo*/): bool {
        $files = $this->fileDataObject->getFiles();
        //$fdo = static::localFactoryMethod();
        //$files = $fdo->getFiles();
        return in_array($fileName, $files);
    }

}