<?php
namespace learning\Zend\EventManager\CachingSystem\Tests;

use learning\Zend\EventManager\CachingSystem\ExperimentalClass;
use PHPUnit\Framework\TestCase;
use Zend\Cache\Storage\Adapter\Filesystem;
use Zend\Cache\StorageFactory;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;

class CachingSystemTest extends TestCase
{

    /**
     * @var Filesystem
     */
    private $cache;

    /**
     * @var
     */
    private $cacheDir = __DIR__ . '/cache';

    public function setUp(): void
    {
        $this->cache = StorageFactory::adapterFactory('filesystem');
        mkdir($this->cacheDir);
        $this->cache->setOptions(['cache_dir' => $this->cacheDir]);
    }

    public function tearDown(): void
    {
        $this->cache->flush();
        rmdir($this->cacheDir);
        unset($this->cache);
    }

    /**
     * @throws \Zend\Cache\Exception\ExceptionInterface
     */
    public function testCachingSystem()
    {
        $experimentalObject = new ExperimentalClass();
        $experimentalObject->setEventManager(new EventManager());

        $experimentalObject->getEventManager()->attach('someExpensiveCall.pre', function (Event $e) {
            $params = $e->getParams();
            $key = md5(json_encode($params));
            $hit = $this->cache->getItem($key);
            return $hit;
        }, 100);

        $experimentalObject->getEventManager()->attach('someExpensiveCall.post', function (Event $e) {
            $params = $e->getParams();
            $result = $e->getParam('__RESULT__');
            unset($params['__RESULT__']);
            $key = md5(json_encode($params));
            $this->cache->setItem($key, $result);
        }, -100);

        $experimentalObject->someExpensiveCall('param1', 'param2');
        $this->assertEquals('1,2,3', $this->cache->getItem(md5(json_encode(['criteria1' => 'param1', 'criteria2' => 'param2']))));
    }
}
