<?php

class Ale extends Beer{
	const NAME = 'Ale';

	public function getStaticName() {
		return static::NAME;
	}
}