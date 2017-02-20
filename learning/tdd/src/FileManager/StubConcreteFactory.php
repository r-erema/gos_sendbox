<?php

namespace FileManager;


class StubConcreteFactory implements IFileDataObjectAbstractFactory {
    public function CreateDataObject() {
        return new StubFileDataObject();
    }
}