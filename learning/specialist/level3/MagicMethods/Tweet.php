<?php

class Tweet extends Entity {

	protected $text;
	protected $id;

	public function __construct($id, $text, array $meta) {
		$this->id = $id;
		$this->text = $text;
		parent::__construct($meta);
	}

	public function __destruct() {}

	public function  __clone() {}

	public function __get($property) {
		if(property_exists($this, $property)) {
			return $this->$property;
		}
		return null;
	}

	public function __set($property, $value) {
		if(property_exists($this, $property)) {
			$this->$property = $value;
		}
	}

	public function __isset($property) {
		return isset($this->$property);
	}

	public function __unset($property) {
		unset($this->$property);
	}

	public function __toString() {
		return (string)$this->text;
	}

	public function __sleep() {
		$this->storage = $this->meta;
		return ['id', 'text', 'meta'];
	}

	public function __wakeup() {
		echo 'Объект класса '.get_class($this).' рассериализован';
	}

	public function __call($method, $parameters) {
		if(in_array($method, ['retweet', 'favourites'])) {
			return call_user_func_array([$this, $method], $parameters);
		}
		return null;
	}

	public static function __callStatic($method, $parameters) {
		return Tweet::$method();
	}

	public function __invoke($val) {
		return $val;
	}

	protected static function test() {
		echo 'test';
	}

	protected function retweet() {
		$this->meta['retweets']++;
	}

	protected function favourite() {
		$this->meta['favourites']++;
	}

}