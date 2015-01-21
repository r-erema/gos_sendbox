<?php
	$db = new PDO('sqlite:users-1.db');
	class User {
		public $city, $name, $color;
		public function __construct() {
			$this->name = 'Olya';
			$this->city = 'Vitebsk';
			$this->color = 'Pink';
		}
	}
	$user = new User();
	//$db->exec("INSERT INTO user VALUES ('Leha' , 'Minsk', 'red')");

	$sql = "SELECT name, city, color FROM user";
	$stmt = $db->query($sql);

//$obj = $stmt->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_UNIQUE);
//	$stmt->setFetchMode(PDO::FETCH_INTO, $user);
//	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
//	$user = $stmt->fetch();


/*
	$sql = "SELECT city FROM user WHERE name = :n";
	$name = "John";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':n', $name);
	//$stmt->execute(['Vasya']);
	$stmt->execute();
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	var_dump($stmt->fetchAll());
*/

/*	$sql = "SELECT name, city, color FROM user";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$stmt->bindColumn(1, $name);
	$stmt->bindColumn(2, $city);
	$stmt->bindColumn(3, $color);
	while($row = $stmt->fetch()) {
		var_dump($name);
		var_dump($city);
		var_dump($color);
	}*/

/*	try {
		$db->beginTransaction();
		$db->exec("INSERT INTO user VALUES ('Valera', 'Volgograd', 'green')");
		$db->exec("INSERT INTO user VALUES ('Katya', 'Vitebsk', 'blue')");
		$db->commit();
	} catch (PDOException $pdoException) {
		var_dump($pdoException->getMessage());
		$db->rollBack();
	}*/

	$sql = "SELECT name, city, color FROM user";
	$stmt = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$stmt->execute();
	while($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST)) {
		var_dump($row);
		break;
	};
