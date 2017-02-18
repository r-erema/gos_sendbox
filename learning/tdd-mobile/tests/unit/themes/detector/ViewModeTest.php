<?php
namespace themes\detector;


use src\DeviceMode;
use src\ClientMode;
use src\ViewMode;

class ViewModeTest extends \Codeception\Test\Unit
{

    /**
     * @dataProvider modeProvider
     * @param $client
     * @param $device
     * @param $result
     */
    public function testMode($client, $device, $result) {
        $clientMode = $this->mockClientMode($client[0], $client[1]);
        $deviceMode = $this->mockDeviceMode($device);
        $viewMode = new ViewMode($clientMode, $deviceMode);
        $this->assertEquals($result, $viewMode->isMobile());
    }

    /**
     * @return array
     */
    public function modeProvider() {
        return [
            'Default mode' => [[false, false], true, true],
            'Force mode' => [[true, false], false, true],
            'Already mobile' => [[true, true], true, true],
            'Default desktop' => [[false, false], false, false],
            'Force desktop' => [[false, true], true, false],
            'Already desktop' => [[false, true], false, false]
        ];
    }
    /**
     * @param $isMobile
     * @param $isDesktop
     * @return \PHPUnit_Framework_MockObject_MockObject | ClientMode
     */
    private function mockClientMode($isMobile, $isDesktop) {
        $clientMode = $this->getMockBuilder(ClientMode::class)->disableOriginalConstructor()->getMock();
        $clientMode->method('isMobile')->willReturn($isMobile);
        $clientMode->method('isDesktop')->willReturn($isDesktop);
        return $clientMode;
    }

    /**
     * @param $isMobile
     * @return \PHPUnit_Framework_MockObject_MockObject | DeviceMode
     */
    private function mockDeviceMode($isMobile) {
        $deviceMock = $this->getMockBuilder(DeviceMode::class)->disableOriginalConstructor()->getMock();
        $deviceMock->method('isMobile')->willReturn($isMobile);
        return $deviceMock;
    }

}