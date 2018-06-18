<?php

use Robo\Tasks;

/** @noinspection PhpUndefinedClassInspection */
class RoboFile extends Tasks
{

	const PROJECT_ROOT = '/home/gutsout/h/praca-portal';

	private function getRootDir()
	{
		return self::PROJECT_ROOT;
	}

	public function initPraca()
	{
		$this->initNginxConfigs();
		$this->initPhpConfigs();
		$this->initSphinxConf();
	}

	public function initNginxConfigs()
	{
		$this->say('Copy nginx configs');
		$this->_mkdir('/var/log/nginx/praca');
		$this->_copy(__DIR__ . '/praca.ryaroma.web.conf', '/etc/nginx/sites-available/praca.ryaroma.web.conf');
		$this->_copy(__DIR__ . '/api.praca.ryaroma.web.conf', '/etc/nginx/sites-available/api.praca.ryaroma.web.conf');
		$this->_symlink('/etc/nginx/sites-available/praca.ryaroma.web.conf', '/etc/nginx/sites-enabled/praca.ryaroma.web.conf');
		$this->_symlink('/etc/nginx/sites-available/api.praca.ryaroma.web.conf', '/etc/nginx/sites-enabled/api.praca.ryaroma.web.conf');

		$this->say('Nginx restart...');
		$this->_exec('service nginx restart');
	}

	public function initPhpConfigs()
	{
		$this->_copy(
			__DIR__ . '/config.development.php',
			"{$this->getRootDir()}/backend/bootstrap/local-configs/config.development.php"
		);
		$this->_copy(
			__DIR__ . '/development.php',
			"{$this->getRootDir()}/config/autoload/environment-depended/development.php"
		);
	}

	public function initSphinxConf()
	{
		$this->_copy(__DIR__ . '/sphinx.conf', '/etc/sphinxsearch/sphinx.conf');
		$this->_exec("searchd -c '/etc/sphinxsearch/sphinx.conf'");
	}

}