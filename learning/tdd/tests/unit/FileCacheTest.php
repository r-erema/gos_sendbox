<?php

use src\FileCache;
use \PHPUnit\Framework\TestCase;
use \org\bovigo\vfs\vfsStreamWrapper;
use \org\bovigo\vfs\vfsStreamDirectory;
use \org\bovigo\vfs\vfsStream;

class FileCacheTest extends TestCase {

    const ROOT_DIR = 'object_root';
    const CACHE_DIR = 'cache';

    const CACHE_LIFETIME_IN_SECONDS = 2;

    /**
     * @var string
     */
    private $cacheDirPath = './cache';

    /*public function setUp() {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory(self::ROOT_DIR));
        $cacheDir = new vfsStreamDirectory(self::CACHE_DIR);
        vfsStreamWrapper::getRoot()->addChild($cacheDir);
        $this->cacheDirPath = vfsStream::url($cacheDir->path());
    }*/
    protected function setUp() {
        //Create cache dir
        if (file_exists($this->cacheDirPath)) {
            $this->_removeCacheDir();
        }
        mkdir($this->cacheDirPath);
    }

    public function tearDown() {
        $this->_removeCacheDir();
    }

    protected function _removeCacheDir() {
        $dir = opendir($this->cacheDirPath);
        if ($dir) {
            while ($file = readdir($dir)) {
                if ($file != '.' && $file != '..') {
                    unlink($this->cacheDirPath . '/' . $file);
                }
            }
        }
        closedir($dir);
        rmdir($this->cacheDirPath);
    }

    public function testFileCacheClassShouldImplementCacheInterface() {
        $fileCache = new FileCache($this->cacheDirPath, self::CACHE_LIFETIME_IN_SECONDS);
        $this->assertInstanceOf(\src\CacheInterface::class, $fileCache);
    }

    public function testSettingCacheDir() {
        $beforeFilesCount = count(scandir($this->cacheDirPath));
        $fileCache = new FileCache($this->cacheDirPath, self::CACHE_LIFETIME_IN_SECONDS);
        $fileCache->save('data_name', 'some data');
        $afterFilesCount = count(scandir($this->cacheDirPath));
        $this->assertGreaterThan($beforeFilesCount, $afterFilesCount);
    }

    public function testSettingCacheLifetime() {
        $cacheData = 'data';
        $cacheId = 'expires';

        $fileCache = new FileCache($this->cacheDirPath, self::CACHE_LIFETIME_IN_SECONDS);
        $fileCache->save($cacheId, $cacheData);

        $this->assertEquals($cacheData, $fileCache->load($cacheId));

        sleep(self::CACHE_LIFETIME_IN_SECONDS + 1);

        $this->assertFalse($fileCache->load($cacheId));
    }

    public function testLoadShouldReturnFalseOnNoExistId() {
        $fileCache = new FileCache($this->cacheDirPath, self::CACHE_LIFETIME_IN_SECONDS);
        $fileCache->save('id', 'some data');
        $this->assertFalse($fileCache->load('non_exists'));
    }

    public function testTwitterShouldCallHttpClientWithCorrectUrl() {
        $httpClient = $this->getMock('HttpClientInterface');
    }

}