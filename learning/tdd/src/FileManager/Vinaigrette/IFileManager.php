<?php

namespace FileManager\Vinaigrette;

interface IFileManager {
    public function findLogFile(string $fileName);
}