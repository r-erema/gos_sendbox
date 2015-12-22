<?php

namespace Observer;

class GeneralLogger extends LoginObserver {
    function doUpdate(Login $login) {
        $status = $login->getStatus();
        print __CLASS__ . ":\tРегистрация в системном журнале" . PHP_EOL;
    }

}