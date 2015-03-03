<?php
class Favorites {

	private $_plugins = [];
	private $_availableClassNames = [];

	const CLASS_DIR = 'classes/';
	const INTERFACE_NAME = 'IPlugins';

	function __construct() {
		foreach(new DirectoryIterator(self::CLASS_DIR) as $fileInfo) {
			if($fileInfo->isFile()) {
				$fileName = $fileInfo->getFilename();
				require_once self::CLASS_DIR.$fileName;
				if(preg_match_all('#(.+?)\.class\.php#',  $fileName)) {
					$className = str_replace('.class.php', '', $fileName);
					$this->_availableClassNames[] = $className;
				}
			}
		}
		foreach($this->findPlugins() as $plugin) {
			$this->_plugins[] = $plugin;
		}
	}

	private function findPlugins() {
		$classesImplementedIPlugins = [];
		foreach($this->_availableClassNames as $className) {
			$currReflClass = new ReflectionClass($className);
			if($currReflClass->implementsInterface(self::INTERFACE_NAME)) {
				$classesImplementedIPlugins[] = $className;
			}
		}
		return $classesImplementedIPlugins;
	}

	public function getFavorites($methodName) {
		$list =[];
		foreach($this->_plugins as $plugin) {
			$currReflClass = new ReflectionClass($plugin);
			if($currReflClass->hasMethod($methodName)) {
				$currReflMethod = $currReflClass->getMethod($methodName);
					$list = $currReflMethod->isStatic() ? array_merge($list, $currReflMethod->invoke(null)) : array_merge($list, $currReflMethod->invoke($currReflClass->newInstance()));
			}
		}
		return $list;
	}
}