<?php

class normativkaDigestParser extends Parser {

	private $digestNumber;
	private $currPart;
	private $currProf;
	private $period;
	private $seminarsMonth;

	public function __construct($text, $params) {
		parent::__construct($text);
		$this->digestNumber =(int) $params['digestNumber'];
	}

	public function run() {
		$tmp = [];
		foreach($this->texts as $context => $text) {
			//$r = $this->handleArticlesText($text);
			$this->period = $this->getDigestPeriod($text);
			$this->parsed = $this->splitDigestOnParts($text);
			$this->seminarsMonth = $this->fetchSeminarsMonth($text);

			//Разбиваем текст по разделам Бухгалтеру/Кадровику/Юристу, Prof.by так не разбиваем
			foreach($this->parsed as $this->currPart => $partText) {
				if($this->currPart != 'Семинары Prof.by') {
					$this->parsed[$this->currPart] = $this->splitPartByProf($partText);
				}
			}

			//Разбиваем разделы по статьям
			foreach($this->parsed as $this->currPart => $profs) {
				if($this->currPart != 'Семинары Prof.by') {
					foreach($profs as $this->currProf => $profText) {
						$tmp[$this->currProf] = $this->splitProfOnArticles($profText);
					}
					$this->parsed[$this->currPart] = $tmp;
					$tmp = null;
				} else {
					$this->parsed[$this->currPart] = $this->splitProfOnArticles($this->parsed[$this->currPart]);
				}
			}

			//Разбиваем статьи по логическим частям: автор/тайтл/ссылка/основной текст
			foreach($this->parsed as $this->currPart => $profs) {
				if($this->currPart != 'Семинары Prof.by') {
					foreach($profs as $this->currProf => $profText) {
						foreach($this->parsed[$this->currPart][$this->currProf] as $article) {
							$tmp[$this->currProf][] = $this->splitArticleOnElements($article);
						}
					}
				} else {
					foreach($this->parsed[$this->currPart] as $seminar) {
						$tmp[] = $this->splitArticleOnElements($seminar);
					}
				}
				$this->parsed[$this->currPart] = $tmp;
				$tmp = null;
			}

			//Разбиваем текст статьи на абзацы
			foreach($this->parsed as $this->currPart => $profs) {
				if($this->currPart != 'Семинары Prof.by') {
					foreach($profs as $this->currProf => $profText) {
						unset($profText);
						foreach($this->parsed[$this->currPart][$this->currProf] as &$article) {
							if(isset($article['text'])) {
								$article['text'] =  $this->handleArticlesText($article['text']);
							}
						}
					}
				} else {
					foreach($this->parsed[$this->currPart] as &$seminar) {
						$seminar['text'] = $this->handleArticlesText($seminar['text']);
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
			case 'Семинары Prof.by' : $pattern = '#[0-9][0-9]? [а-я]+ ?(?:.+?)(?=(?:\r\n[0-9][0-9]? [а-я]+ ?)|$)#su'; break;
			default : die("Невозможно разбить текст на статьи, неивестная часть дайджеста: $this->currPart, $this->currProf"); break;
		}
		preg_match_all($pattern, $text, $matches);
		if(empty($matches[0])) {
			die("Не удалось извлечь статьи из части: $this->currPart, $this->currProf");
		} else {
			return $matches[0];
		}
	}

	private function splitArticleOnElements($article) {
		$pattern = null;
		$splitArticle = [];
		switch($this->currPart) {
			case 'Анонс аналитических материалов' : $pattern = '#([А-Я]\.[А-Я]\. [А-Я][а-я]+.?)\r\n(http.+?)?\r\n(.+?)\r\n(.+)#su'; break;
			case 'Нормативно-правовая информация' : $pattern = '#(.+?)\r\n(http.+?)\r\n(.+)#su'; break;
			case 'Читайте на следующей неделе' : $pattern = '#([А-Я]\.[А-Я]\. [А-Я][а-я]+.?)\r\n(http.+?)\r\n(.+)#su'; break;
			case 'Семинары Prof.by' : $pattern = '#(^[0-9][0-9]? [а-я]+ ??)\r\n(http.+?)\r\n(.+?):\r\n(.+)#su'; break;
			default : die("Невозможно статью на части, неивестная часть дайджеста: $this->currPart, $this->currProf, метод: ".__METHOD__); break;
		}
		preg_match_all($pattern, $article, $matches);
		switch($this->currPart) {
			case 'Анонс аналитических материалов' :
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из статьи: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($matches[2][0]);
				empty($matches[3][0]) ? die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[3][0]);
				empty($matches[4][0]) ? die ("Не удалось извлечь основной текст из статьи: $article<br> Часть: $this->currPart") : $splitArticle['text'] = trim($matches[4][0]);
				break;
			case 'Нормативно-правовая информация' :
				empty($matches[1][0]) ? die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из статьи: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($matches[2][0]);
				empty($matches[3][0]) ? die ("Не удалось извлечь основной текст из статьи: $article<br> Часть: $this->currPart") : $splitArticle['text'] = trim($matches[3][0]);
				break;
			case 'Читайте на следующей неделе' :
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из статьи: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($matches[2][0]);
				empty($matches[3][0]) ? die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[3][0]);
				break;
			case 'Семинары Prof.by' :
				empty($matches[1][0]) ? die ("Не удалось извлечь дату семинара: $article<br> Часть: $this->currPart") : $splitArticle['date'] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из семинара: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($matches[2][0]);
				empty($matches[3][0]) ? die ("Не удалось извлечь заголовок из семинара: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[3][0]);
				empty($matches[4][0]) ? die ("Не удалось извлечь основной текст из семинара: $article<br> Часть: $this->currPart") : $splitArticle['text'] = trim($matches[4][0]);
				break;
				break;
			default : die("Невозможно статью на части, неивестная часть дайджеста: $this->currPart, $this->currProf, метод: ".__METHOD__); break;
		}
		return $splitArticle;
	}

	private function handleArticlesText($text) {
		$splText = [];
		preg_match_all('#.+?(?:\r\n|$)#su', $text, $matches);
		if(empty($matches[0])) {
			die("Не удалось разбить текст статьи на параграфы<br>Часть дайджеста: $this->currPart<br>Текст: $text");
		}

		//Работаем с маркированными абзацами: ложим их в отдельный массив,
		//потому что в верстке их надо будет запихуть в <ul><li>, а не в <p> как остальные
		for($i = 0; $i < count($matches[0]); $i++) {
			if($this->isMarkedParagraph($matches[0][$i])) {
				$j = $i;
				$splText[$j][] = trim($this->deleteMarker($matches[0][$i]));
				while($this->isMarkedParagraph($matches[0][$i+1])) {
					$splText[$j][] = trim($this->deleteMarker($matches[0][$i+1]));
					$i++;
					if(!isset($matches[0][$i+1]))break;
				}
			} else {
				$splText[$i] = trim($matches[0][$i]);
			}
		}

		return $splText;
	}

	private function isMarkedParagraph($paragraph) {
		return (boolean) preg_match('#[●•].+#su', $paragraph);
	}

	private function deleteMarker($str) {
		preg_match('#[●•](.+)#su', $str, $matches);
		if(empty($matches[1])) {
			die('Не удалось удалить маркер');
		} else {
			return $matches[1];
		}
	}

	private function fetchSeminarsMonth($text) {

	}

}