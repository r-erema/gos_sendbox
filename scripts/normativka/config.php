<?php
//const NORMATIVKA_PATH = '/home/gutsout/h/normativka';
const NORMATIVKA_PATH = '/home/gutsout/h/normativka';
return [
    'db' => [
		'host' => 'localhost',
		'user' => 'root',
		'password' => 'mmm_beer11',
		'db_name' => 'normativkaby',
		'charset' => 'utf8'
	],
	/*'db' => [
		'host' => 'mysql.web',
		'user' => 'sites_db_access',
		'password' => 'bRNqWmZSn9e8wEZV',
		'db_name' => 'normativkaby',
		'charset' => 'utf8'
	],*/
	/*'db' => [
		'host' => 'localhost',
		'user' => 'sites_db_access',
		'password' => 'ndMkdpsr3Pe3f3khe',
		'db_name' => 'normativkaby',
		'charset' => 'utf8'
	],*/
	/*'db' => [
		'host' => 'localhost',
		'user' => 'root',
		'password' => '3kozERu93xCoh',
		//'db_name' => 'normativkaby',
		//'db_name' => 'buhgalterby',
		//'db_name' => 'kadrovikby',
		//'db_name' => 'ekonomistby',
		'db_name' => 'jurisconsultby',
		'charset' => 'utf8'
	],*/
	'my_login' => 'r.yaroma@normativka.by',
	//'php' => '/usr/bin/php5.6',
	'php' => 'php',
	'normativka_env' => 'development',
	'normativka_domain' => 'normativka.ryaroma.web',
	//'normativka_domain' => 'normativka.nr-test2.web',
	'normativka_path' => NORMATIVKA_PATH,
	'normativka_cron_path' => NORMATIVKA_PATH . '/cron',
	'normativka_portal_path' => NORMATIVKA_PATH . '/portal',
	'salt' => 'fhGg46dksksfhj',
	'subscribers_file' => '/home/gutsout/normativka/subscribers'
	//'subscribers_file' => '/home/gutsout/h/sandbox/scripts/normativka/subscribers'
];