<?php

namespace src;

use Detection\MobileDetect;

class DeviceMode {

    /**
     * @var MobileDetect
     */
    private $detect;

    /**
     * DeviceMode constructor.
     * @param MobileDetect $detect
     */
    public function __construct(MobileDetect $detect) {
        $this->detect = $detect;
    }

    /**
     * @return bool
     */
    public function isMobile() {
        return $this->detect->isMobile() || $this->detect->isTablet();
    }
}