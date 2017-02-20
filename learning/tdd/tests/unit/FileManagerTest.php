<?php


class FileManagerTest extends \Codeception\Test\Unit
{

    public function testFindLogFile() {
        //$mgr = new \FileManager\FileManager(new \FileManager\StubFileDataObject());
        //$mgr->setFileDataAccessObject(new \FileManager\StubFileDataObject());
        //$this->assertTrue($mgr->findLogFile('file2.log', new \FileManager\StubFileDataObject()));
        $mgr = new \FileManager\FileManagerUnderTest();
        $this->assertTrue($mgr->findLogFile('file2.log'));
    }

}