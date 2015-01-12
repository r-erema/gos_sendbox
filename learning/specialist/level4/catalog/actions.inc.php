<?php
switch($_POST['action']){
	case 'order':
		$titles = $_POST['order'];
		foreach($titles as $title){
			$dvd = new DVD($title);
			$dvd->buy();
		}
		break;
	case 'anthology':
		$f = new DVDFactory();
		if(isset($_POST['bonus']) && $_POST['bonus'] == 1) {
			$dvd = $f->create('BonusDVD');
		} else {
			$dvd = $f->create('DVD');
		}
		$band = trim(strip_tags($_POST['band']));
		$tracks = array_map(function($val){return (int)$val;}, $_POST['order']);
		$dvd = new DVD();
		$dvd->setBand($band);
		foreach ($tracks as $track) {
			$dvd->addTrack($track);
		}
		break;
	case 'list':
		$id = abs((int)$_POST['id']);
		$band = trim(strip_tags($_POST['band']));
		$title = trim(strip_tags($_POST['title']));
		$dvd = new DVDStrategy();
		if(isset($_POST['format']) && $_POST['format'] == "1") {
			$obj = new DVDAsJSON();
		} else {
			$obj = new DVDAsXML();
		}
		$dvd->setStrategy($obj);
		$dvd->get($id);
		/*$dvd->setTitle($title);
		$dvd->setBand($band);
		$dvd->getXML($id);*/
		break;
}
header('Location: catalog.php');
exit;
?>