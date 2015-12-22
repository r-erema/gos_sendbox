<?php

namespace Observer;

use Observer\bySPL\Login;
use Observer\bySPL\LoginObserver;

class SecurityMonitor extends LoginObserver {

    public function doUpdate(Login $login) {
        print __CLASS__ . ":\tОтправка почты системному администратору" . PHP_EOL;
    }

}