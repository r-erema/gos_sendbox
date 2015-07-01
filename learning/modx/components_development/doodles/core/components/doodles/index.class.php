<?php
require_once dirname(__FILE__) . '/model/doodles/doodles.class.php';
abstract class DoodlesManagerController extends modExtraManagerController {

	public $doodles;

	public function initialize() {
		$this->doodles = new Doodles($this->modx);

		$this->addCss($this->doodles->config['cssUrl'] . 'mgr.css');
		$this->addJavascript($this->doodles->config['jsUrl'] . 'mgr/doodles.js');
		$this->addHtml('
			<script type="text/javascript">
				Ext.onReady(function () {
					Doodles.config = ' . $this->modx->toJSON($this->doodles->config) . ';
				});
			</script>
		');
		parent::initialize();
		//return ;
	}

	public function getLanguageTopics() {
		return array('doodles:default');
	}

	public function checkPermissions() { return true; }

}

class DoodlesIndexManagerController extends DoodlesManagerController {
	public static function getDefaultController() {
		$g = 1;
		return 'home';
	}
}
