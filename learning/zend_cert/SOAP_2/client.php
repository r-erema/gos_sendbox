<?php
try {
  // Создание SOAP-клиента
  $client = new SoapClient("http://gutsout.web/learning/zend_cert/SOAP_2/stock.wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));

  // Посылка SOAP-запроса c получением результат
  $result = $client->getStock("b");
  echo "Текущий запас на складе: ", $result;
} catch (SoapFault $exception) {
  echo $exception->getMessage();
}
?>