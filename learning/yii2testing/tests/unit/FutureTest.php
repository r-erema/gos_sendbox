<?php


use Codeception\TestCase\Test;

class FutureTest extends Test
{

    /**
     * @group future
     */
    public function testSomeFuture() {
        $this->markTestIncomplete();
    }

    /**
     * @group future
     */
    public function testSomeFuture2() {
        $this->markTestIncomplete();
    }

    /**
     * @expectedException yii\base\ErrorException
     */
    public function testSomeFuture3() {
        $this->setExpectedExceptionFromAnnotation();
        $res = 2 / 0;
    }

    public function testSaveToMSSQL() {
        if (!extension_loaded('mssql')) {
            $this->markTestSkipped('The MSSQL extension is not available');
        }
    }
}