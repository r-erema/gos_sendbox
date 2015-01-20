<?php
	require_once 'NewsPDO.php';
	$db = new PDO("sqlite:news.db");
/*
	$newsDB = new NewsPDO();
	var_dump($newsDB->saveNews('testTitle', 2, 'testDescr', 'testSource'));
	var_dump($newsDB->getNews());
*/
	class testDescr {
		public $id;
		public $title;
		public $description;

		public function nameToUpper() {
			return strtoupper($this->title);
		}

	}


$sql = "SELECT description, title, category, id FROM msgs WHERE title = 'testTitle'";
var_dump($sql);
$stmt = $db->query($sql);
//$obj = $stmt->fetch(PDO::FETCH_CLASS|PDO::FETCH_CLASSTYPE);
//$obj = $stmt->fetchAll(PDO::FETCH_CLASS, 'testDescr');
//$obj = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
var_dump($obj);