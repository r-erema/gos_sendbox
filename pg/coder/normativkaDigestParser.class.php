<?php

class normativkaDigestParser extends Parser {

	private $currPart;
	private $currProf;
	public $digestNumber;
	public $period;
	public $seminarsMonth;

	private $authorsPhotos = array(
		'М.Б. Хивук' => "hivuk.png",
		'О.Н. Сушко' => "sushko.png",
		'О.Ю. Савина' => "savina.png",
		'Н.Н. Метельская'=> "metelskaya.png",
		'Ю.Г. Кардымон' => "kardimon.png",
		'В.Э. Самосейко' => "samoseyko.png",
		'А.В. Анисимова' => "anisimova.png",
		'А.В. Волчек' => "volchyok.png",
		'Е.Ю. Бурина' => "burina.png",
		'В.Ф. Алексеева' => "alekseeva.png",
		'А.В. Недоступ' => "nedostup.png",
		'Н.А. Дубинский' => "dubinskiy.png",
		'О.И. Гасюкевич' => "gasukevich.png",
		'С.Ч. Белявский' => "belyavskiy.png",
		'Л.А. Шерснёва' => "shersneva.png",
		'А.Я. Татринова' => "tatrinova.png",
		'Н.Е. Нехай' => "nehay.png",
		'А.И. Штейнер' => "shteiner.png",
		'Д.В. Григорович' => "grigorovich.png",
		'Т.А. Тёмкина' => "temkina.png",
		'В.Н. Лемеш' => "lemesh.png",
		'А.Э. Аброскин' => "abroskin.png",
		'И.Е. Демидович' => "demidovich.png",
		'О.Н. Бортошик' => "bortoshik.png",
		'С.И. Ерошина' => "eroshina.png",
		'С.С. Семенихина' => "semenihina.png",
		'В.Л. Полторан' => "poltoran.png",
		'А.В. Жук' => "zhuk.png",
		'Ю.В. Назаренко' => "nazarenko.png",
		'Н.Г. Семижон' => "semigon.png",
		'А.А. Бурда' => "burda.png",
		'Е.Ю. Четверикова' => "chetverikova.png",
		'Л.И. Пиянзина' => "piyanzina.png",
		'Т.А. Михейчик' => "miheychyk.png",
		'В.Г. Ржеутская' => "rjeutskaya.png",
		'Л.А. Шерснева' => "shersneva.png",
		'П.В. Хроменко' => "hromenko.png",
		'Е.А. Авчинникова' => "avchinnikova.png",
		'Н.Н. Грабовская' => "grabovskaya.png",
		'В.М. Аникович' => "anikovich.png",
		'Е.В. Мурашко' => "murashko.png",
		'А.В. Черва' => "cherva.png",
		'В.В. Белокопытов' => "belokopitov.png",
		'В.М. Филиппенков' => "filippenkov.png",
		'И.А. Тихонович' => "tihonovich.png",
		'И.В. Клименков' => "klimenkov.png",
		'Е.А. Стриховская' => "strihovskaya.png",
		'Т.А. Саханько' => "sahanko.png",
		'О.П. Чиж' => "chiz.png",
		'В.В. Хатько' => "hatko.png",
		'Л.И. Пиязина' => "piyanzina.png",
		'Н.В. Недоступ' => "nedostup.png",
		'Д.В. Семашко' => "semashko.png",
		'И.Е. Демилович' => "demilovich.png",
		'И.С. Бурак' => "burak.png",
		'Н.В. Андрейчикова' => "andreychikova.png",
		'Д.Ю. Бирук' => "biruk.png",
		'Е.Н. Бурак' => "burak.png",
		'М.В. Шатило' => "shatilo.png",
		'Ю.К. Прокопенкова' => "prokopenkova.png",
		'Н.С. Хаданович' => "hadanovich.png",
		'Г.А. Худоченко' => "hudochenko.png",
		'В.В. Толкач' => "tolkach.png",
		'Н.Л. Сивец' => "sivec.png",
		'С.Н. Козырев' => "kozirev.png",
		'М.В. Лось' => "los.png",
		'В.В. Дражин' => "dragin.png",
		'Е.В. Гадлевская' => "gadlevskaya.png",
		'А.В. Баранашник' => "baranashnik.png",
		'В.Д. Мацинкевич' => "macinkevich.png",
		'А.А. Пощастьева' => "poschastyeva.png",
		'С.В. Морозова' => "morozova.png",
		'О.В. Прокопенко' => "prokopenko.png",
		'Г.Ф. Асоскова' => "asoskova.png",
		'Н.Е. Король' => "korol.png",
		'Е.И. Мельникова' => "melnikova.png",
		'Р.А. Верменков' => "veremenkov.png",
		'Е.А. Недоступ' => "nedostup_ea.png",
	);

	public function __construct($text, $params) {
		parent::__construct($text);
		$this->digestNumber =(int) $params['digestNumber'];
	}

	public function run() {
		$tmp = [];
		foreach($this->texts as $context => $text) {

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
		$this->renderLayout("normativka-digest/mainLayout.php");
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
		preg_match_all('#Бухгалтеру(.+?)(?:Экономисту(.+?))?Кадровику(.+?)Юристу(.+?)$#su', $text, $matches);
		if(empty($matches[1][0])) {
			die("Не удалось извлечь текст 'Бухгалтеру' в части $this->currPart");
		} elseif(empty($matches[3][0])) {
			die("Не удалось извлечь текст 'Кадровику' в части $this->currPart");
		} elseif(empty($matches[4][0])) {
			die("Не удалось извлечь текст 'Юристу' в части $this->currPart");
		} else {
			$splParts['Бухгалтеру'] = trim($matches[1][0]);
			!empty($matches[2][0]) ? $splParts['Экономисту'] = trim($matches[2][0]) : null;
			$splParts['Кадровику'] = trim($matches[3][0]);
			$splParts['Юристу'] = trim($matches[4][0]);
			return $splParts;
		}
	}

	private function splitProfOnArticles($text) {
		$pattern = null;
		switch($this->currPart) {
			case 'Анонс аналитических материалов' : $pattern = '#[А-Я]\.[А-Я]\. [А-Я][а-я]+(?:, [А-Я]\.[А-Я]\. [А-Я][а-я])?.+?(?=(?:[А-Я]\.[А-Я]\. [А-Я][а-я]+(?:, [А-Я]\.[А-Я]\. [А-Я][а-я])?|$))#su'; break;
			case 'Нормативно-правовая информация' : $pattern = '#^.+$\nhttp.+$(?:(?s).+?)(?=(?:^.+$\nhttp))|(?:(?s).+$)#mu'; break;
			case 'Читайте на следующей неделе' : $pattern = '#[А-Я]\.[А-Я]\. [А-Я][а-я]+(?:, [А-Я]\.[А-Я]\. [А-Я][а-я])?.+?(?=(?:[А-Я]\.[А-Я]\. [А-Я][а-я]+(?:, [А-Я]\.[А-Я]\. [А-Я][а-я])?|$))#su'; break;
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
			case 'Анонс аналитических материалов' : $pattern = '#([А-Я]\.[А-Я]\. [А-Я][а-яё]+.)(?:, ([А-Я]\.[А-Я]\. [А-Я][а-яё]+.))??\r\n(http.+?)?\r\n(.+?)\r\n(.+)#su'; break;
			case 'Нормативно-правовая информация' : $pattern = '#(.+?)\r\n(http.+?)\r\n(.+)#su'; break;
			case 'Читайте на следующей неделе' : $pattern = '#([А-Я]\.[А-Я]\. [А-Я][а-яё]+.)(?:, ([А-Я]\.[А-Я]\. [А-Я][а-яё]+.))??\r\nhttp.+?\r\n(.+)#su'; break;
			case 'Семинары Prof.by' : $pattern = '#(^[0-9][0-9]? [а-я]+ ??)\r\n(http.+?)\r\n(.+?):\r\n(.+)#su'; break;
			default : die("Невозможно статью на части, неивестная часть дайджеста: $this->currPart, $this->currProf, метод: ".__METHOD__); break;
		}
		preg_match_all($pattern, $article, $matches);
		switch($this->currPart) {
			case 'Анонс аналитических материалов' :
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][0]['name'] = trim($matches[1][0]);
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][0]['photo'] = $this->getAuthorPhotoByName($splitArticle['authors'][0]['name']);
				if(!empty($matches[2][0])) {
					$splitArticle['authors'][1]['name'] = trim($matches[2][0]);
					$splitArticle['authors'][1]['photo'] = $this->getAuthorPhotoByName($splitArticle['authors'][1]['name']);
				}
				empty($matches[3][0]) ? die ("Не удалось извлечь ссылку из статьи: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($this->normalizeLink($matches[3][0]));
				empty($matches[4][0]) ? die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[4][0]);
				empty($matches[5][0]) ? die ("Не удалось извлечь основной текст из статьи: $article<br> Часть: $this->currPart") : $splitArticle['text'] = trim($matches[5][0]);
				break;
			case 'Нормативно-правовая информация' :
				empty($matches[1][0]) ?
					die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") :
					$splitArticle['title'] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из статьи: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($this->normalizeLink($matches[2][0]));
				empty($matches[3][0]) ? die ("Не удалось извлечь основной текст из статьи: $article<br> Часть: $this->currPart") : $splitArticle['text'] = trim($matches[3][0]);
				break;
			case 'Читайте на следующей неделе' :
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][0]['name'] = trim($matches[1][0]);
				empty($matches[1][0]) ? die ("Не удалось извлечь автора из статьи: $article<br> Часть: $this->currPart") : $splitArticle['authors'][0]['photo'] = $this->getAuthorPhotoByName($splitArticle['authors'][0]['name']);
				if(!empty($matches[2][0])) {
					$splitArticle['authors'][1]['name'] = trim($matches[2][0]);
					$splitArticle['authors'][1]['photo'] = $this->getAuthorPhotoByName($splitArticle['authors'][1]['name']);
				}
				empty($matches[3][0]) ? die ("Не удалось извлечь заголовок из статьи: $article<br> Часть: $this->currPart") : $splitArticle['title'] = trim($matches[3][0]);
				break;
			case 'Семинары Prof.by' :
				empty($matches[1][0]) ? die ("Не удалось извлечь дату семинара: $article<br> Часть: $this->currPart") : $splitArticle['date'] = trim($matches[1][0]);
				empty($matches[2][0]) ? die ("Не удалось извлечь ссылку из семинара: $article<br> Часть: $this->currPart") : $splitArticle['link'] = trim($this->normalizeLink($matches[2][0]));
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
				while(isset($matches[0][$i+1]) ? $this->isMarkedParagraph($matches[0][$i+1]) : false) {
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
		preg_match_all('#Семинары на ([а-я]+?)\r\n#u', $text, $matches);
		if(empty($matches[1][0])) {
			die("Не удалось извлечь месяц семинаров");
		} else {
			return $matches[1][0];
		}
	}

	private function normalizeLink($link) {
		preg_match('#http.+?(?=sid|$)#u', $link, $matches);
		if(empty($matches[0])) {
			die('Не удалось удалить лишнее из ссылки');
		} else {
			return $matches[0];
		}
	}

	private function getAuthorPhotoByName($authorName) {
		if(!isset($this->authorsPhotos[$authorName])) {
			die("Не удалось найти фото автора $authorName");
		}
		return $this->authorsPhotos[$authorName];
	}

	public function profArticlesHasSeveralAuthors($articles) {
		foreach($articles as $article) {
			if(count($article['authors']) > 1) return true;
		}
		return false;
	}
}