<?php

class LogRequest extends DecorateProcess {
    public function process(RequestHelper $requestHelper) {
        print __CLASS__ . ": регистрация запроса" . PHP_EOL;
        $this->processRequest->process($requestHelper);
    }
}