<?php
	require 'INewsDB.class.php';

	class NewsDB implements INewsDB {

		protected $_db;
		const DB_NAME = 'E:\dev\server\domains\localhost\htdocs\learning\specialist\level3\SQLite\news\news.db';

		function __construct() {
			$this->db = new SQLite3(self::DB_NAME);
		}

		function __destruct() {
			unset($this->db);
		}

		function saveNews($title, $category, $description, $source){}
		function getNews(){}
		function deleteNews($id){}
	}

new NewsDB();