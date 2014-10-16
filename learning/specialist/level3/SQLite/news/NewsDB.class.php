<?php
	require 'INewsDB.class.php';

	class NewsDB implements INewsDB {

		protected $_db;
		const DB_NAME = 'D:\dev\server\domains\localhost\htdocs\learning\specialist\level3\SQLite\news\news.db';

		public function __construct() {
			if(is_file(self::DB_NAME)) {
				$this->_db = new SQLite3(self::DB_NAME);
			} else {
				$this->_db = new SQLite3(self::DB_NAME);
				$sql = "CREATE TABLE  messages (
							id INTEGER PRIMARY KEY AUTOINCREMENT,
							title TEXT,
							category INTEGER,
							description TEXT,
							source TEXT,
							datetime, INTEGER
						);
						CREATE TABLE categories(
							id INTEGER,
							name TEXT
						);
						INSERT INTO CATEGORIES(id, name)
							SELECT 1 as id, 'Политика' as name UNION
							SELECT 2 as id, 'Культура' as name UNION
							SELECT 3 as id, 'Спорт' as name";
				$this->_db->exec($sql) || die($this->_db->lastErrorMsg());
			}
		}

		public function __destruct() {
			unset($this->db);
		}

		public function clearStr($data) {
			$data = trim(strip_tags($data));
			return $this->_db->escapeString($data);
		}

		public function clearInt($data) {
			return abs((int)$data);
		}

		public function saveNews($title, $category, $description, $source){
			try {
				$dateTime = time();
				$sql = "INSERT INTO messages(title, category, description, source, datetime) VALUES ('$title', $category, '$description', '$source', $dateTime)";
				$res = $this->_db->exec($sql);
				if(!$res) {
					throw new Exception($this->_db->lastErrorMsg());
				}
				return true;
			} catch(Exception $e) {
				return false;
			}
		}

		protected function db2Arr(SQLite3Result $data) {
			$arr = [];
			while($row = $data->fetchArray(SQLITE3_ASSOC)) {
				$arr[] = $row;
			}
			return $arr;
		}

		public function getNews(){
			try {
				$sql = "SELECT messages.id as id, title, CATEGORIES.name as category, description, source, datetime
					FROM messages, CATEGORIES WHERE CATEGORIES.id = messages.category
					ORDER BY messages.id DESC";
				$res = $this->_db->query($sql);
				if(!is_object($res)) {
					throw new Exception($this->_db->lastErrorMsg());
				}
				return$this->db2Arr($res);
			} catch(Exception $e) {
				return false;
			}
		}

		public function deleteNews($id){
			try {
				$sql = "DELETE FROM messages WHERE id = $id";
				$res = $this->_db->exec($sql);
				if(!$res) {
					throw new Exception($this->_db->lastErrorMsg());
				} elseif(!$this->_db->changes()) {
					throw new Exception('Не удалено ни одной новости');
				}
				return true;
			} catch(Exception $e) {
				return false;
			}
		}

	}