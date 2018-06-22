<?php
return array(
	'praca_pdo_params' => array(
		'database' => 'praca-test-portal',
		'username' => 'root',
		'password' => 'mmm_beer11',
		'hostname' => 'localhost',
	),
	'service_manager' => array(
		'factories' => array(
			'Zend\Db\Adapter\Adapter' => 'Praca\Db\Adapter\PdoServiceFactory',
		),
	),
	'static_servers' => array(
		1 => 'https://praca.ryaroma.web/files/'
	),
	'ConverterView' => array(
		'pdf_server_url' => 'http://pi-test.web/AsposeWordConvertService/api/Converter',
		'pdf_model_options' => array(
			'header' => 'application/pdf',
			'extension' => 'pdf',
		),
		'pdf_options' => array(
			'Format' => 'Pdf',
			'FileName' => 'dummy.pdf',
		),
		'word_server_url' => 'http://pi-test.web/AsposeWordConvertService/api/Converter',
		'word_options' => array(
			'Format' => 'Doc',
			'FileName' => 'dummy.doc',
		),
		'word_model_options' => array(
			'header' => 'application/msword',
			'extension' => 'doc',
		),
	),
	'wssServer' => 'wss://praca.ryaroma.web/ws/',
	'publicUrl' => 'https://praca.ryaroma.web',
);