<?php
class KatyaPlugin implements IPlugins {
	public static function getName() {}
	private $_games = [
		'Grand Theft Auto V',
		'FIFA 15',
		'Destiny'
	];
	private static $_films = [
		'Однажды в сказке',
		'Гнездо землеройки',
		'Лофт'
	];

	public function getGames() {
		return $this->_games;
	}
	public static function getFilms() {
		return self::$_films;
	}
}