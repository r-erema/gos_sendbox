<?php
namespace themes\detector;

use Codeception\Test\Unit;
use Detection\MobileDetect;

class MobileDetectTest extends Unit {

    public function testMobile() {
        $detect = new MobileDetect([
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Linux; Android 4.0; Galaxy Nexus AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0 Mobile Safari/535.19'
        ]);
        $this->assertTrue($detect->isMobile());
        $this->assertFalse($detect->isTablet());
    }
}