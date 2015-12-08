<?php

class AuthenticateRequest extends DecorateProcess {
    public function process(RequestHelper $requestHelper) {
        print __CLASS__ . ": аутентификаця запроса" . PHP_EOL;
        $this->processRequest->process($requestHelper);
    }
}