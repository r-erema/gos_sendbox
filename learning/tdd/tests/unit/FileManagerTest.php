<?php


class FileManagerTest extends \Codeception\Test\Unit
{

    public function testFindLogFile() {

        $client = new \FileManager\Vinaigrette\Client(new \FileManager\Vinaigrette\StubConcreteFactory());
        $mgr = $client->run();

        $this->assertTrue($mgr->findLogFile('file2.log'));
    }

}