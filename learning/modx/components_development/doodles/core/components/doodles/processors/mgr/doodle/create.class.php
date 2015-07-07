<?php
 class DoodlesCreateProcessor extends modObjectCreateProcessor {
	public $classKey = 'Doodle';
	public $languageTopics = array(
		'doodles:default'
	);
	public $objectType = 'doodles.doodle';

	public function beforeSave() {
		$name = $this->getProperty('name');

		if (empty($name)) {
			$this->addFieldError('name', $this->modx->lexicon('doodles.doodle_err_ns_name'));
		} elseif ($this->doesAlreadyExist(array('name' => $name))) {
			$this->addFieldError('name', $this->modx->lexicon('doodles.doodle_err_ae'));
		}
		return parent::beforeSave();
	}
}

return 'DoodlesCreateProcessor';