<?php

namespace FileManager;


class FactoryClass {

    /**
     * @var IFileDataObject
     */
    public static $fdo;

    public static function CreateDataAccessObject(): IFileDataObject {
        if (static::$fdo !== null) {
            return static::$fdo;
        }
        return new FileDataObject();
    }

    /**
     * @param IFileDataObject $fdo
     */
    public function SetFDO(IFileDataObject $fdo): void {
        static::$fdo = $fdo;
    }

}