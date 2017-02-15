<?php

use \src\Mocks\Synoptic;
use \PHPUnit\Framework\TestCase;

class SynopticTest extends TestCase {

    const MOCK_METHOD_getTemperature = 'getTemperature';
    const MOCK_METHOD_getWord = 'getWord';
    const MOCK_METHOD_showWord = 'showWord';

    /**
     * @dataProvider temperatureDataProvider
     * @param $temperature
     * @param $expectedWord
     */
    public function testProcess($temperature, $expectedWord) {
        $mock = $this->getMockBuilder(Synoptic::class)
                     ->setMethods([
                        self::MOCK_METHOD_getTemperature,
                        self::MOCK_METHOD_getWord,
                        self::MOCK_METHOD_showWord,
                     ])
                     ->getMock();
        $mock->expects($this->once())->method(self::MOCK_METHOD_getTemperature)->will($this->returnValue($temperature));
        $mock->expects($this->once())->method(self::MOCK_METHOD_getWord)->will($this->returnValue($expectedWord));
       // $mock->expects($this->once())->method(self::MOCK_METHOD_showWord)->with($this->equalTo($expectedWord));
        $eq = $this->equalTo($expectedWord);
        $mock->expects($this->once())->method(self::MOCK_METHOD_showWord)->with($this->equalTo($expectedWord));
        $mock->process();
    }

    /*public function testWithAndWillUsage($temperature, $expectedWord) {
        $mock = $this->getMockBuilder(Synoptic::class)->setMethods([self::MOCK_METHOD_getWord])->getMock();
        $mock->expects($this->once())
             ->method(self::MOCK_METHOD_getWord)
             ->with($this->greaterThan(25))
             ->will($this->returnValue('hot'));

        $mock->expects($this->once())
             ->method(self::MOCK_METHOD_getWord)
             ->with($this->logicalAnd($this->greaterThanOrEqual(15), $this->lessThanOrEqual(25)))
             ->will($this->returnValue('warm'));

        //$this->assertEquals('hot', $mock->getWord(30));
        $this->assertEquals('warm', $mock->getWord(20));
    }*/

    public function temperatureDataProvider() {
        return [[10, 'cold'], [20, 'warm'], [30, 'hot']];
    }

}
