<?php

namespace FileManager;

interface IFileManager {
    public function findLogFile(string $fileName);
}