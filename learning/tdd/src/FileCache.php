<?php

namespace src;

class FileCache implements CacheInterface {

    /**
     * @var string
     */
    private $cacheDirPath;

    /**
     * @var float
     */
    private $cacheLifetimeInSeconds;

    public function __construct(string $cacheDirPath, float $lifeTimeInSeconds) {
        $this->cacheDirPath = $cacheDirPath;
        $this->cacheLifetimeInSeconds = $lifeTimeInSeconds;
    }

    public function save($id, $data): bool {
        $fileName = $this->getCacheFileNameById($id);

        $file = fopen($fileName, 'w');
        fwrite($file, serialize($data));
        fclose($file);

        return true;
    }

    public function load($id) {
        $fileName = $this->getCacheFileNameById($id);
        if (!file_exists($fileName) || (time() - fileatime($fileName) > $this->cacheLifetimeInSeconds)) {
            return false;
        }
        return unserialize(file_get_contents($fileName));
    }

    private function getCacheFileNameById($id) {
        return $this->cacheDirPath . DIRECTORY_SEPARATOR . $id . '.dat';
    }


}