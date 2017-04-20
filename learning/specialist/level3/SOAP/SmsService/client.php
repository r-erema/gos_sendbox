<?php
	header("Content-Type: text/html; charset=utf-8");
	header('Cache-Control: no-store, no-cache');
	header('Expires: '.date('r'));

	set_include_path(get_include_path()
		.PATH_SEPARATOR.'classes'
		.PATH_SEPARATOR.'objects');


	function __autoload($class_name){
		include $class_name.'.class.php';
	}

	ini_set('display_errors', 1);
	error_reporting(E_ALL & ~E_NOTICE);

class Message {
	public $phone;
	public $text;
	public $date;
	public $type;
}

class MessageList {
	public $message;
}

class Request {
	public $messageList;
}

$req = new Request();
$req->messageList = new MessageList();
$req->messageList->message = new Message();
$req->messageList->message->phone = '8616649';
$req->messageList->message->text = 'Happy New Year!';
$req->messageList->message->date = '2015-01-01T15:00:00.26';
$req->messageList->message->phone = 11;

try {
	$client = new SoapClient('http://gutsout.web:8080/learning/specialist/level3/SOAP/SmsService/service.wsdl', ['soap_version' => SOAP_1_2]);
	var_dump($client->__getFunctions());
	var_dump($client->sendSms());
} catch (SoapFault $e) {
	echo $e->getMessage();
}