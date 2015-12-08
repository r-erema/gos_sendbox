<?php

class MainProcess extends ProcessRequest{

    public function process(RequestHelper $req) {
        print __CLASS__ . ': выполнение запроса' . PHP_EOL;
    }

}