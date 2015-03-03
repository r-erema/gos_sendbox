<?php
class IraPlugin implements IPlugins {
	public static function getName() {}
	private $_games = [
		'inFAMOUS: Первый свет',
		'Shadow Warrior',
		'Minecraft',
		'Одни из нас. Обновлённая версия',
		'Орден 1886'
	];
	private $_music = [
		'Влади Каста',
		'Guf',
		'Noize MC'
	];

	public function getGames() {
		return $this->_games;
	}
	public function getMusic() {
		return $this->_music;
	}
}