<?php
class MatveyPlugin implements IPlugins{
	public static function getName() {}
	private static $_music = [
		'Влади Каста',
		'Guf',
		'Noize MC'
	];
	private $_films = [
		'Восхождение Юпитер',
		'Игра в имитацию'
	];

	public static function getMusic() {
		return self::$_music;
	}

	public function getFilms() {
		return $this->_films;
	}
}