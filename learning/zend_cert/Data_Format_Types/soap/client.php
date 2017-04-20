<?php

header('Content-Type: text/xml; charset=utf-8');
header('Cache-Control: no-store, no-cache');
header('Expires: ' . date('r'));

class Message {
    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $date;

    /**
     * @var string
     */
    public $type;

    /**
     * Message constructor.
     * @param string $phone
     * @param string $text
     * @param string $date
     * @param string $type
     */
    public function __construct($phone, $text, $date, $type) {
        $this->phone = $phone;
        $this->text = $text;
        $this->date = $date;
        $this->type = $type;
    }
}

class MessageList {
    /**
     * @var Message[]
     */
    public $messages = [];
}

class Request {
    /**
     * @var MessageList
     */
    public $messageList;
}

$request = new Request();
$request->messageList = new MessageList();
$request->messageList->messages[] = new Message('+375291111111', 'test message', date('Y-m-d H:i:s'), 15);
$request->messageList->messages[] = new Message('+375292222222', 'test message2', date('Y-m-d H:i:s'), 16);
$request->messageList->messages[] = new Message('+375293333333', 'test message3', date('Y-m-d H:i:s'), 17);
$request->messageList->messages = (object) $request->messageList->messages;
use_soap_error_handler(true);
set_error_handler(function($errno, $errstr) {
    file_put_contents('log.log', "Error in client {$errno}, ${errstr}" . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
});

try {
    $url = "http://gutsout.web:8080/learning/zend_cert/Data_Format_Types/soap/service_upd.wsdl";
    $client = new SoapClient($url, ['soap_version' => SOAP_1_2]);
    $result = $client->sendSms($request);
    header('Content-Type: text/html; charset=utf-8');
    var_dump($result);
} catch (SoapFault $e) {
	echo $e->getMessage();
}