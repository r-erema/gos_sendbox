<?php
namespace themes\detector;

use src\ClientMode;
use yii\web\Cookie;
use yii\web\CookieCollection;
use yii\web\Request;

class ClientModeTest extends \Codeception\Test\Unit
{

    /**
     * @dataProvider modeProvider
     * @param $mode
     * @param $isMobile
     * @param $isDesktop
     */
    public function testMode($mode, $isMobile, $isDesktop) {
        $request = $this->mockRequest($mode);
        $clientMode = new ClientMode($request);
        $this->assertEquals($isMobile, $clientMode->isMobile(), 'Mobile is correct');
        $this->assertEquals($isDesktop, $clientMode->isdesktop(), 'Mobile is correct');
    }

    /**
     * @return array
     */
    public function modeProvider() {
        return [
            'Default' => ['', false, false],
            'Choose mobile' => ['mobile', true, false],
            'Choose desktop' => ['desktop', false, true],
            'Incorrect' => ['other', false, false]
        ];
    }

    /**
     * @param $mode
     * @return \PHPUnit_Framework_MockObject_MockObject | \Request
     */
    private function mockRequest($mode) {
        $cookies = $mode ? ['mode' => new Cookie(['name' => 'mode', 'value' => $mode])] : [];
        $request = $this->getMockBuilder(Request::class)->getMock();/*->setMethods(['getCookies'])*/
        $request->method('getCookies')->willReturn(new CookieCollection($cookies));
        return $request;
    }

}