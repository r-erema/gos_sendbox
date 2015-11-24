<?php

class XmlException extends Exception {

    private $error;

    public function __construct(LibXMLError $error) {
        $shortFile = basename($error->file);
        $message = "[$shortFile, string: $error->line";
        $message .= "column: $error->column] $error->message";
        $this->error = $error;
        parent::__construct($message, $error->code);
    }

    public function getXLibXmlError() {
        return $this->error;
    }

}