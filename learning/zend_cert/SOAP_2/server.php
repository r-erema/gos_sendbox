<?php
function getStock($id) {
    $stocks = [
        'a' => 100,
        'b' => 200,
        'c' => 300,
        'd' => 400,
        'e' => 500,
    ];
    if (isset($stocks[$id])) {
        return $stocks[$id];
    } else {
        throw new SoapFault('Server', 'Id is wrong');
    }
}

ini_set('soap.wsdl_cache_enabled', '0');

$wsdlUrl = 'http://gutsout.web/learning/zend_cert/SOAP_2/stock.wsdl';
//$wsdlUrl = 'http://gutsout.web/learning/zend_cert/soap/stock.wsdl';
$server = new SoapServer($wsdlUrl);
$server->addFunction('getStock');
$server->handle();