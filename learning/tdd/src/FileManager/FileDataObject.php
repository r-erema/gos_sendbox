<?php

namespace FileManager;

class FileDataObject implements IFileDataObject {

    /**
     * @return string[]
     */
    public function getFiles() : array {
        return scandir(__DIR__);
    }

}