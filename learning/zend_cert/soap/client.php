<?php
try {
  // Создание SOAP-клиента
  $client = new SoapClient("http://gutsout.web/learning/zend_cert/soap/stock.wsdl");
	
  // Посылка SOAP-запроса c получением результат
  $result = $client->getStock("1");
  echo "Текущий запас на складе: ", $result;
} catch (SoapFault $exception) {
  echo $exception->getMessage();	
}
?>