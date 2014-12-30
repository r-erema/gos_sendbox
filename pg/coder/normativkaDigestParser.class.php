<?php

class normativkaDigestParser extends Parser {

	private $digestNumber;
	private $currPart;
	private $currProf;
	private $period;

	public function __construct($text, $params) {
		parent::__construct($text);
		$this->digestNumber =(int) $params['digestNumber'];
	}

	public function run() {
		foreach($this->texts as $context => $text) {
			$this->period = $this->getDigestPeriod($text);
			$splitParts = $this->splitDigestOnParts($text);
			foreach($splitParts as $this->currPart => $partText) {
				if($this->currPart != 'Семинары Prof.by') {
					$splitPartsByProf[$this->currPart] = $this->splitPartByProf($partText);
					foreach($splitPartsByProf[$this->currPart] as $prof => $profText) {
						$this->currProf = $prof;
						$splitOnArticles[$this->currPart][$prof] = $this->splitProfOnArticles($profText);
					}
				}
			}
		}
		$this->renderLayout("normativka-digest/main.php");
	}

	private function splitDigestOnParts($text) {
		$splitParts = [];
		$requirePartsPatterns = [
			'Анонс аналитических материалов' => '#Анонс аналитических материалов\r\n_*(.+?)_*\r\nНормативно-правовая информация#su',
			'Нормативно-правовая информация' => '#Последние изменения в законодательстве Республики Беларусь\r\n_+\r\n(.+?)\r\nЧитайте на следующей неделе#su',
			'Читайте на следующей неделе' => '#Читайте на следующей неделе.*?_+(.+?)(?:Семинары Prof.by|$)#su',
		];
		$notRequirePatterns = [
			'Семинары Prof.by' => '#Семинары Prof.by\r\n_*(.+?)$#su',
		];
		foreach($requirePartsPatterns as $part => $pattern) {
			preg_match_all($pattern, $text, $matches);
			if(!empty($matches[1][0])) {
				$splitParts[$part] = trim($matches[1][0]);
			} else {
				die("Не удалось разделить дайджест на части. Не нашлось совпадений в части $part");
			}
		}
		foreach($notRequirePatterns as $part => $pattern) {
			preg_match_all($pattern, $text, $matches);
					if(!empty($matches[1][0])) {
						$splitParts[$part] = trim($matches[1][0]);
					}
				}
		return $splitParts;
	}

	private function getDigestPeriod ($text) {
		preg_match_all('#Читайте на следующей неделе\r\n(.+?)\r\n#su', $text, $matches);
		if(empty($matches[1][0])) {
			die('Не удалось извлечь период');
		}
		return $matches[1][0];
	}

	private function splitPartByProf($text) {
		preg_match_all('#Бухгалтеру(.+?)Кадровику(.+?)Юристу(.+?)$#su', $text, $matches);
		if(empty($matches[1][0])) {
			die("Не удалось извлечь текст 'Бухгалтеру' в части $this->currPart");
		} elseif(empty($matches[2][0])) {
			die("Не удалось извлечь текст 'Кадровику' в части $this->currPart");
		} elseif(empty($matches[3][0])) {
			die("Не удалось извлечь текст 'Юристу' в части $this->currPart");
		} else {
			return [
				'Бухгалтеру' => trim($matches[1][0]),
				'Кадровику' => trim($matches[2][0]),
				'Юристу' => trim($matches[3][0])
			];
		}
	}

	private function splitProfOnArticles($text) {
		$pattern = null;
		switch($this->currPart) {
			case 'Анонс аналитических материалов' : $pattern = '#[А-Я]\.[А-Я]\. [А-Я][а-я]+.+?(?=(?:[А-Я]\.[А-Я]\. [А-Я][а-я]+|$))#su'; break;
			case 'Нормативно-правовая информация' : $pattern = '#^.+$\nhttp.+$(?:(?s).+?)(?=(?:^.+$\nhttp))|(?:(?s).+$)#mu'; break;
			case 'Читайте на следующей неделе' : $pattern = '#[А-Я]\.[А-Я]\. [А-Я][а-я]+.+?(?=(?:[А-Я]\.[А-Я]\. [А-Я][а-я]+|$))#su'; break;
			default : die("Невозможно разбить текст на статьи, неивестная часть дайджеста: $this->currPart, $this->currProf"); break;
		}
		preg_match_all($pattern, $text, $matches);
		if(empty($matches[0])) {
			die("Не удалось извлечь статьи из части: $this->currPart, $this->currProf");
		} else {
			return $matches[0];
		}
	}

}