<?php

namespace FileManager\Vinaigrette;

class Client {

    /**
     * @var IFileDataObjectAbstractFactory
     */
    private $factory;

    /**
     * Client constructor.
     * @param IFileDataObjectAbstractFactory $factory
     */
    public function __construct(IFileDataObjectAbstractFactory $factory) {
        $this->factory = $factory;
    }

    /**
     * @return IFileManager
     */
    public function run(): IFileManager {
        return new FileManager($this->factory->CreateDataObject());
    }

}