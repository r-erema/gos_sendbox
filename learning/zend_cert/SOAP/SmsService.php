<?php
header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));

ini_set('soap.wsdl_cache_enabled', '0');

$url = "http://{$_SERVER['HTTP_HOST']}/learning/zend_cert/SOAP/soap.wsdl.php";
$server = new SoapServer($url);
$server->setClass("SoapSmsGateWay");
$server->handle();
$f = $server;