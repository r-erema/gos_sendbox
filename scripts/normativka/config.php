<?php
const NORMATIVKA_PATH = '/home/gutsout/h/normativka';
return [
	'db' => [
		'host' => 'mysql.web',
		'user' => 'sites_db_access',
		'password' => 'bRNqWmZSn9e8wEZV',
		'db_name' => 'normativkaby',
		'charset' => 'utf8'
	],
	'my_login' => 'r.yaroma@normativka.by',
	'normativka_env' => 'development',
	'normativka_domain' => 'normativka.ryaroma.web',
	'normativka_path' => NORMATIVKA_PATH,
	'normativka_cron_path' => NORMATIVKA_PATH . '/cron',
	'normativka_portal_path' => NORMATIVKA_PATH . '/portal',
	'sudo_pass' => 'mmm_beer11'
];