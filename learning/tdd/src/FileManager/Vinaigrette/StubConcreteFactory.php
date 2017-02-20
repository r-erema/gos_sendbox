<?php

namespace FileManager\Vinaigrette;


class StubConcreteFactory implements IFileDataObjectAbstractFactory {
    public function CreateDataObject() {
        return new StubFileDataObject();
    }
}