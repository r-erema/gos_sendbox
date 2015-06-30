<?php
	class Doodles {
		public $modx;
		public $config = array();
		function __construct(modX &$modx, array $config = array()) {
			$config = !is_array($config) ? array() : $config;
			$this->modx =& $modx;

			$basePath = $this->modx->getOption('doodles.core_path',$config,$this->modx->getOption('core_path').'components/doodles/');
			$assetsUrl = $this->modx->getOption('doodles.assets_url',$config,$this->modx->getOption('assets_url').'components/doodles/');

			$this->config = array_merge(array(
				'basePath' => $basePath,
				'corePath' => $basePath,
				'modelPath' => $basePath.'model/',
				'processorsPath' => $basePath.'processors/',
				'chunksPath' => $basePath.'elements/chunks/',
				'jsUrl' => $assetsUrl.'js/',
				'cssUrl' => $assetsUrl.'css/',
				'assetsUrl' => $assetsUrl,
				'connectorUrl' => $assetsUrl.'connector.php'
			) , $config);

			$this->modx->addPackage('doodles',$this->config['modelPath']);
		}
	}