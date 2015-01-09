<?php
	class News {
		public $news = [
			1 => [
				'title' => 'news 1',
				'text' => 'fishtext'
			],
			2 => [
				'title' => 'news 2',
				'text' => 'fishtext'
			],
			3 => [
				'title' => 'news 3',
				'text' => 'fishtext'
			]
		];

		public function getNewsById($id) {
			return isset($this->news[$id]) ? $this->news[$id] : ['Новости с id: ' . $id . ' не существует'];
		}

		public function xmlRpcGetNewsById($methodName, $args, $extra) {
			if(!is_array($args) || count($args) != 1) {
				return ['faultCode' => -3, 'faultString' => 'Неверное количество параметров'];
			}
			$id = $args[0];
			$result = $this->getNewsById($id);
			if(!is_array($result)) {
				return ['faultCode' => -2, 'faultString' => "Ошибка: $result!"];
			} elseif(empty($result)) {
				return ['faultCode' => -1, 'faultString' => "Новости с id: $id не существует"];
			} else {
				return serialize($result);
			}
		}
	}

	$requestXML = file_get_contents('php://input');
	//Создаем XML-RPC сервер
	$xmlRpcServer = xmlrpc_server_create();
	//Регистрируем метод класса
	xmlrpc_server_register_method($xmlRpcServer, 'getNewsById', [new News(), 'xmlRpcGetNewsById']);
	//Отдаем правильный заголовок
	header('Content-Type: text/xml;charset=utf-8');
	print xmlrpc_server_call_method($xmlRpcServer, $requestXML, null);