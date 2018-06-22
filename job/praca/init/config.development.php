<?php

	define('DOCTRINE_DEV_MODE', true);
	define('PRACA_API_USE_PROFILER', false);
	!defined('PRACA_API_LOG_LEVEL') && define('PRACA_API_LOG_LEVEL', LOG_INFO);

	$dbOptions = array(
		'dbname' => 'praca-test-api',
		'user' => 'root',
		'password' => 'mmm_beer11',
		'host' => 'localhost',
		'driver' => 'pdo_mysql',
		'charset' => 'utf8mb4',
	);

	$mailOptions = array(
		'charset'    => 'utf-8',
		'from_email' => 'mail@praca.by',
		'from_name'  => 'Praca.by',
		'reply_to_email' => 'moderator@praca.by',
		'reply_to_name'  => 'Praca.by',
		'smtp' => array(
			[
				'name' => 'praca.by',
				'host' => 'smtp.yandex.ru',
				'port' => 465,
				'connection_class'  => 'login',
				'connection_config' => array(
					'username' => 'mail@praca.by',
					'password' => 'ghfy&4trg&567',
					'ssl' => 'ssl',
				),
			],
		),
		'reconnect_after_messages_sent' => 1000,
	);

	$queueOptions = array(
		'enabled' => true,
		'broker_host' => '127.0.0.1',
		'vhost' => 'praca',
		'login' => 'guest',
		'password' => 'guest',
	);

	$fileServerClient = array(
		'adapter' => 'HttpFileServer',
		'adapter_options' => array(
			'base_uri' => 'https://praca.ryaroma.web/file-server/praca.php',
			'requests_timeout' => 5
		),
	);

	$sphinxClient = array(
		'server' => 'localhost',
		'port' => '9306',
		'max_matches' => 10000,
	);

	$mongoDb = array(
		'server' => 'localhost',
		'port' => '27017',
		'database' => 'praca',
	);

	$strings = array(
		'site_public_url' => 'https://praca.ryaroma.web',
		'resume_url' => 'https://praca.ryaroma.web/resume/%s/',
		'vacancy_url' => 'https://praca.ryaroma.web/vacancy/%s/',
		'static_content_url' => 'https://praca.ryaroma.web/files/',
	);

	$settings = array(
		'auto_generate_api_proxies' => false,
	);

	$memcache = array(
		'server' => '127.0.0.1',
		'port' => '11211',
		'use_cache' => true,
	);

	$payment = array(
		'webpay' => array(
			'secure-data' => array(
				'wp_user' => 'praca',
				'wp_password' => 'kj7h7UD9cJ',
				'secret_key' => '@#$Tsdhgsd34yGEDY#$UDSG',
			),
			'shop-data' => array(
				'storeid' => '948207452',
				'store' => 'Praca.by',
				'currency_id' => 'BYN',
				'version' => 2,
				'language_id' => 'russian',
				'seed' => '',
				'signature' => '',
				'test' => 0,
			),
		),
	);

	$push = array(
		'is_sandbox_enabled' => true,
		'android_api_key' => 'AIzaSyAAcuYRCQWWjIgzsRPCox6-RzcCWhqkHMw',
		'ios_push_cert_path' => __DIR__ . '/ios_push_cert_sandbox.pem'
	);

	return array(
		'database' => $dbOptions,
		'mail' => $mailOptions,
		'mail_autosearch' => $mailOptions,
		'queue' => $queueOptions,
		'file_server_client' => $fileServerClient,
		'sphinx_client' => $sphinxClient,
		'mongo_db' => $mongoDb,
		'strings' => $strings,
		'settings' => $settings,
		'memcache' => $memcache,
		'payment' => $payment,
		'push' => $push,
	);