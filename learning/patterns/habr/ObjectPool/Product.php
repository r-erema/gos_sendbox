<?php

namespace ObjectPool;

class Product {

	/**
	 * @var int|string
	 */
	protected $id;

	/**
	 * Product constructor.
	 * @param int|string $id
	 */
	public function __construct($id) {
		$this->id = $id;
	}

	/**
	 * @return int|string
	 */
	public function getId() {
		return $this->id;
	}


}