<?php

class StructureRequest extends DecorateProcess {
    public function process(RequestHelper $requestHelper) {
        print __CLASS__ . ": упорядочение данных запроса" . PHP_EOL;
        $this->processRequest->process($requestHelper);
    }
}