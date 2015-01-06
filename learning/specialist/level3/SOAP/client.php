<?php
try {
	$client = new SoapClient('http://localhost/learning/specialist/level3/SOAP/stock.wsdl');
	var_dump($client->__getFunctions());
	echo "Response: ".$client->getStock(4);
} catch (SoapFault $e) {
	echo $e->getMessage();
}

