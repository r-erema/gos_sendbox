<?php

namespace FileManager\Vinaigrette;

class StubFileDataObject implements IFileDataObject {

    /**
     * @return string[]
     */
    public function getFiles() : array {
        return [
            'file1.txt',
            'file2.log',
            'file3.exe',
        ];
    }

}