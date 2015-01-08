<?php
	header('Content-Type: text/xml; charset=utf-8');
	header('Cache-Control: no-store, no-cache');
	header('Expires: '.date('r'));

	set_include_path(get_include_path().PATH_SEPARATOR.'classes'.PATH_SEPARATOR.'objects');

	const CONF_NAME = "config.ini";

	function __autoload($className) {
		include $className.'class.php';
	}

	ini_set('soap.wsdl_cache_enabled', '0');

	class SoapSmsGateWay {
		public function sendSms($message) {
			return ['status' => true];
		}
	}

	$server = new SoapServer('http://localhost/learning/specialist/level3/SOAP/SmsService/service.wsdl', ['soap_version' => SOAP_1_2]);
	$server->setClass('SoapSmsGateWay');
	$server->handle();