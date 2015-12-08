<?php

namespace Multiton;

abstract class Factory extends FactoryAbstract {

	/**
	 * @return mixed
	 */
	final public static function getInstance() {
		return parent::getInstance();
	}

	public static function removeInstance() {
		parent::removeInstance();
	}
}