<?php

namespace FileManager\DI_Unity;

class FileManager {

    /**
     * @var IDataAccessObject;
     */
    public $dao;

    /**
     * @return IDataAccessObject
     */
    public function getDao(): IDataAccessObject {
        return $this->dao;
    }

    /**
     * @param IDataAccessObject $dao
     */
    public function setDao(IDataAccessObject $dao) {
        $this->dao = $dao;
    }

    public function findLogFile(string $fileName): bool {
        $files = $this->dao->getFiles();
        return in_array($fileName, $files);
    }
}