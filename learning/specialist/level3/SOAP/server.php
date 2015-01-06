<?php

function getStock($id) {
	$stock = [
		1 => 100,
		2 => 200,
		3 => 300,
		4 => 400,
		5 => 500
	];
	if(isset($stock[$id])) {
		return $stock[$id];
	} else {
		throw new SoapFault('Server', 'Unknown id');
	}
}

ini_set('soap.wsdl_cache_enabled', '0');

$server = new SoapServer('stock.wsdl');
$server->addFunction('getStock');
$server->handle();