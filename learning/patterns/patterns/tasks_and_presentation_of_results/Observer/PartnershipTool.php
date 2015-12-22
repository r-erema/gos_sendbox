<?php

namespace Observer;

class PartnershipTool extends LoginObserver{
    function doUpdate(Login $login) {
        $status = $login->getStatus();
        print __CLASS__ . ":\tОтправка cookie-файла, если адрес соответсвует списку" . PHP_EOL;
    }

}