<?php

abstract class DecorateProcess extends ProcessRequest {

    /**
     * @var ProcessRequest
     */
    protected $processRequest;

    /**
     * DecorateProcess constructor.
     * @param ProcessRequest $processRequest
     */
    public function __construct(ProcessRequest $processRequest) {
        $this->processRequest = $processRequest;
    }


}