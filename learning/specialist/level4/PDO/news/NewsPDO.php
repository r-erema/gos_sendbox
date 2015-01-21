<?php
	class NewsPDO {
		private $_db;
		const DB_NAME = 'news.db';
		const DB_CONNECTION_STRING = "sqlite:news.db";

		public function __construct() {
			try {
				$this->_db = new PDO(self::DB_CONNECTION_STRING);
				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->_db->beginTransaction();
				$sql = "CREATE TABLE msgs(
								id INTEGER PRIMARY KEY AUTOINCREMENT,
								title TEXT,
								category INTEGER,
								description TEXT,
								source TEXT,
								datetime INTEGER
							)";
				$this->_db->exec($sql);
				$sql = "CREATE TABLE category(
									id INTEGER PRIMARY KEY AUTOINCREMENT,
									name TEXT
								)";
				$this->_db->exec($sql);
				$sql = "INSERT INTO category(id, name)
					SELECT 1 as id, '��������' as name
					UNION SELECT 2 as id, '��������' as name
					UNION SELECT 3 as id, '�����' as name";
				$this->_db->exec($sql);
				$this->_db->commit();
			} catch (PDOException $e) {
				$this->_db->rollBack();
				var_dump($e->getMessage());
			}
		}

		public function __destruct() {
			unset($this->_db);
		}

		public function getNews() {
			try {
				$sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime
						FROM msgs, category
						WHERE category.id = msgs.category
						ORDER BY msgs.id DESC";
				$result = $this->_db->query($sql);
				if($result === false) {
					throw new PDOException($this->_db->errorInfo());
				}
				$arr = [];
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$arr[] = $row;
				}
				return $arr;
			} catch(PDOException $e) {
				echo $e->getCode() . ": " . $e->getMessage();
			}
		}

		public function deleteNews($id) {
			try {
				$sql = $sql = "DELETE FROM msgs WHERE id = $id";
				$result = $this->_db->exec($sql);
				if ($result === false) {
					throw new PDOException($this->_db->errorInfo());
				}
				return true;
			} catch (PDOException $e) {
				echo $e->getCode() . ": " . $e->getMessage();
			}
		}

		public function saveNews($title, $category, $description, $source) {
			try {
				$dt = time();
				$title = $this->_db->quote($title);
				$description = $this->_db->quote($description);
				$source = $this->_db->quote($source);

				$sql = "INSERT INTO msgs(title, category, description, source, datetime)
					VALUES($title, $category, $description, $source, $dt)";
				$result = $this->_db->exec($sql);
				if($result === false) {
					throw new PDOException($this->_db->errorInfo());
				}
				return true;
			} catch(PDOException $e) {
				echo $e->getCode() . ": " . $e->getMessage();
			}

		}

	}