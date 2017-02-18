<?php
namespace themes\detector;


use Detection\MobileDetect;
use src\DeviceMode;

class DeviceModeTest extends \Codeception\Test\Unit
{

    /**
     * @dataProvider modeProvider
     * @param $isMobile
     * @param $isTablet
     * @param $result
     */
    public function testMode($isMobile, $isTablet, $result) {
        $detect = $this->mockMobileDetect($isMobile, $isTablet);
        $deviceMode = new DeviceMode($detect);
        $this->assertEquals($result, $deviceMode->isMobile());
    }

    public function modeProvider() {
        return [
            'Mobile' => [true, false, true],
            'Tablet' => [false, true, true],
            'Desktop' => [false, false, false]
        ];
    }

    /**
     * @param $isMobile
     * @param $isTablet
     * @return MobileDetect|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockMobileDetect($isMobile, $isTablet) {
        $detect = $this->getMockBuilder(MobileDetect::class)->getMock();
        $detect->method('isMobile')->willReturn($isMobile);
        $detect->method('isTablet')->willReturn($isTablet);
        return $detect;
    }


}