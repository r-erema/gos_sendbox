<?php
header('Content-Type: text/html; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: '.date('r'));

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

$request = new Request();
$request->messageList = new MessageList();
$request->messageList->message = new Message();
$request->messageList->message->phone = '375298616649';
$request->messageList->message->text = 'Test 1';
$request->messageList->message->date = date('Y-m-d H:i:s');
$request->messageList->message->type = 15;

$url = "http://{$_SERVER['HTTP_HOST']}/learning/zend_cert/SOAP/soap.wsdl.php";
$client = new SoapClient($url, ['soap_version' => SOAP_1_2, 'location' => $url]);
try {
    var_dump($client->sendSms($request));
} catch (Exception $e) {
    $e = $e;
}