<?php

namespace FileManager;

class ConcreteFactory implements IFileDataObjectAbstractFactory {
    public function CreateDataObject() {
        return new FileDataObject();
    }
}