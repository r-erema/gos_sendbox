<?php
class DVD{
	protected $_id;
	protected $_title;
	protected $_band;
	protected $_tracks = array();
	protected $_db;
	
	function __construct($id=0){
		$this->_id = $id;
		$this->_db = DB::getInstance();
	}
	
	public function setTitle($title){
		$this->_title = $title;
	}
	
	public function setBand($band){
		$this->_band = $band;
	}
	/* ���������� ����� � ��������� ��� ����������� ��������� ����������� */
	public function addTrack($track){
		$this->_tracks[] = $track;
	}
	/* ������������ ������ ����� */
	public function buy(){
		$this->_db->updateQuantity($this->_id, -1);
		// ������ ��������
	}
	/* ���������� ������ ����������� - ������ */
	public function showCatalog(){
		$result = $this->_db->selectItems();
		if(is_array($result))
			return $result;
		else
			return '�� ��������';
	}
	/* 	���������� ������ ���� ������ ���������� ����������� 
	*	��������������� �� ��������
	*/
	public function showBand($band){
		$result = $this->_db->selectItemsByBand($band);
		if(is_array($result))
			return $result;
		else
			return '�� ��������';
	}
	/* ���������� ��������� ������ �� ������� ������ */
	public function showAlbum($id){
		$result = $this->_db->selectItemsByTitle($id);
		if(is_array($result))
			return $result;
		else
			return '�� ��������';
	}
	/* ���������� ���������� �� ������� � ������� XML */
	public function getXML($id){
		$doc = new DomDocument('1.0', 'utf-8');
		$doc->formatOutput = true;
		$doc->preserveWhiteSpace = false;
		$root = $doc->createElement('dvd');
		$doc->appendChild($root);
		$band = $doc->createElement('band', $this->_band);
		$root->appendChild($band);
		$title = $doc->createElement('title', $this->_title);
		$root->appendChild($title);
		
		$tracks = $doc->createElement('tracks');
		$root->appendChild($tracks);
		$result = $this->_db->selectItemsByTitle($id);
		foreach($result as $item){
			$track = $doc->createElement('track', $item['title']);
			$tracks->appendChild($track);
		}
		$file_name = $this->_band.'-'.$this->_title.'.xml';
		file_put_contents('output/'.$file_name, $doc->saveXML());
	}
	
	/* ���������� ��������� ������ � ����. ������ ��� ������������ */
	function __destruct(){
		if($this->_tracks){
			file_put_contents(__DIR__.'\tracks.log', time().'|'.serialize($this->_tracks)."\n", FILE_APPEND);
		}
	}
}

class BonusDVD extends DVD {
	public function __construct() {
		parent::__construct($id = 0);
		$this->_tracks[] = -1;
	}
}

class DVDFactory {
	public static function create($className) {
		switch($className) {
			case 'DVD' : return new DVD(); break;
			case 'BonusDVD' : return new BonusDVD(); break;
			default : die('Unknown class');
		}
	}
}

class DVDStrategy {
	private $_strategy;
	public function setStrategy($obj) {
		$this->_strategy = $obj;
	}
	public function get($id) {
		return $this->_strategy->get($id);
	}
	public function __call($method, $args) {
		$this->_strategy->$method($args[0]);
	}
}

interface DVDFormat {
	public function get();
}

class DVDAsXML extends DVD implements DVDFormat {
	public function get($id=null) {
		$doc = new DomDocument('1.0', 'utf-8');
		$doc->formatOutput = true;
		$doc->preserveWhiteSpace = false;
		$root = $doc->createElement('dvd');
		$doc->appendChild($root);
		$band = $doc->createElement('band', $this->_band);
		$root->appendChild($band);
		$title = $doc->createElement('title', $this->_title);
		$root->appendChild($title);

		$tracks = $doc->createElement('tracks');
		$root->appendChild($tracks);
		var_dump($id);
		$result = $this->_db->selectItemsByTitle($id);
		foreach($result as $item){
			$track = $doc->createElement('track', $item['title']);
			$tracks->appendChild($track);
		}
		$file_name = $this->_band.'-'.$this->_title.'.xml';
		file_put_contents('output/'.$file_name, $doc->saveXML());
	}
}

class DVDAsJSON extends DVD implements DVDFormat {
	public function get() {
		$doc = [];
		$doc['dvd']['band'] = $this->_band;
		$doc['dvd']['title'] = $this->_title;
		$doc['dvd']['tracks'] = [];
		$result = $this->_db->selectItemsByTitle($this->_id);
		foreach($result as $item) {
			$track = $doc['dvd']['tracks'][] = $item['title'];
		}
		$fileName = $this->_band . '-' . $this->_title . '.json';
		file_put_contents('output/'.$fileName, json_encode($doc));
	}
}