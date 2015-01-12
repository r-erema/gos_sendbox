<?php
	abstract class Renderer {
		private $_document;
		abstract public function render();
		public function setDocument($document) {
			$this->_document = $document;
		}
	}

	class HTMLRenderer extends Renderer {
		public function render() {

		}
	}

	class XMLRenderer extends Renderer {
		public function render() {

		}
	}

	function RenderFactory() {
		$accept = strtolower($_SERVER['HTTP_ACCEPT']);
		if(strpos($accept, "text/xml") > 0) {
			return new XMLRenderer();
		} else {
			return new HTMLRenderer();
		}
	}

	$renderer = RenderFactory();
	$renderer->setDocument('Some content...');
	$renderer->render();
