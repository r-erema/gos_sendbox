<?php

header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

file_put_contents('log.log', 'In sms service' . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);

ini_set('soap.wsdl_cache_enabled', '0');


use_soap_error_handler(true);
set_error_handler(function($errno, $errstr) {
    file_put_contents('log.log', "Error in sms service {$errno}, ${errstr}" . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
});

$server = new SoapServer("http://gutsout.web:8080/learning/zend_cert/Data_Format_Types/soap/service_upd.wsdl");

class SoapSmsGateWay {

    /**
     * @param $data
     * @return array
     */
    public function sendSms($data) {
        file_put_contents("log.log", file_get_contents('php://input'), FILE_APPEND);
        return ['status' => 'true'];
    }
}
$class = SoapSmsGateWay::class;
$server->setClass($class);
$server->handle();

