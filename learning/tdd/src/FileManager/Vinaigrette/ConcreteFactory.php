<?php

namespace FileManager\Vinaigrette;

class ConcreteFactory implements IFileDataObjectAbstractFactory {
    public function CreateDataObject() {
        return new FileDataObject();
    }
}