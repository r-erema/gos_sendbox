<?php
class profizDigestParser extends Parser {

	private $context;
	private $currRubric;

	private $magsParams = [
		'peo' => [
			'name' => 'Планово-экономический отдел',
			'link' => 'http://www.profiz.ru/peo/'
		],
		'kr' => [
			'name' => 'Кадровые решения',
			'link' => 'http://www.profiz.ru/kr/'
		],
		'sr' => [
			'name' => 'Секретарь-референт',
			'link' => 'http://www.profiz.ru/sr/'
		],
		'sec' => [
			'name' => 'СанЭпидемКонтроль',
			'link' => 'http://www.profiz.ru/sec/'
		],
		'eco' => [
			'name' => 'Справочник эколога',
			'link' => 'http://www.profiz.ru/eco/'
		],
		'se' => [
			'name' => 'Справочник экономиста',
			'link' => 'http://www.profiz.ru/se/'
		]
	];
	private $rubricsWithoutAuthors = [
		'ДОКУМЕНТ НОМЕРА',
		'ВОПРОС — ОТВЕТ',
		'СЛОВАРЬ КАДРОВИКА',
		'KADROVIK-INFO.RU',
	];

	private $rubricsWithoutTitles = [
		'ВОПРОС — ОТВЕТ',
	];

	private $articlesWithoutAuthors = [
		'Ваш вопрос',
		'Ваши вопросы',
		'Вопрос — ответ',
	];

	/**
	 *
	 */
	public function run() {
		foreach($this->texts as $context => $text) {
			$this->context = $context;
			//Разбиваем весь текст по журналам
			foreach ($this->fetchMagsTexts($text) as $this->context => $mag_text) {
				//Разбиваем текст журналов на рубрики
				$fetchedRubrics = $this->fetchRubrics($mag_text);
				//Разбиваем каждую рубрику на статьи
				$fetchedArticles = $this->fetchArticlesFromRubrics($fetchedRubrics);

				//Выделяему в каждой статье тайтл, ссылку, автора, основной текст...
				$splitArticles = [];
				foreach($fetchedArticles as $rubricName => $articles) {
					$this->currRubric = $rubricName;
					if(!empty($articles)) {
						foreach($articles as $article) {
							$art = $this->splitArticleOnElements($article);
							$art['text'] = &$this->handleArticlesText($art['text']);
							$this->parsed[$this->context][$rubricName][] = $art;
						}
					} else {
						$this->parsed[$this->context][$rubricName] = null;
					}
				}
			}
		}
		$this->getLayout();
	}

	/**
	 * Вытягиваеттекст рубрик из всего текста
	 * @return array
	 */
	private function fetchRubrics($text) {
		$rubrics = [];
			switch($this->context) {
				case 'super' : $pattern = '#^_{5,}([A-ZА-ЯЁ —\-\.]{3,})?\s(.*)(?:(?=\s^Подробно о журнале))#msu'; $matches[1] = 'Костыль'; break;
				case 'eco' : $pattern = '#(^[А-Я\—., ]{7,}?)(\r\n.*?)?(?:(?=^[А-Я\—., ]{7,}\r\n|_{7,}))#msu'; $matches[1] = 'Костыль'; break;
				default : $pattern = '#^([A-ZА-ЯЁ —\-\,.]{7,})\s(.+?)(?:(?=\s^[A-ZА-ЯЁ —\-\.]{7,}\s|Подробно о журнале))#msu'; break;
			}
			preg_match_all($pattern, $text, $matches);
			if(!empty($matches[1]) && !empty($matches[2])) {
				for($i = 0; $i < count($matches[1]); $i++) {
					$rubrics[$matches[1][$i]] = trim($matches[2][$i]);
				}
			} else {
				die("<p>Не удалось распарсить текст по рубрикам: не найдено совпадений.</p><p>Контекст: $this->context</p>");
			}
		return $rubrics;
	}

	/**
	 * Вытягивает статьи из каждой рубрики по отдельности
	 * @param $rubrics
	 * @return array
	 */
	private function fetchArticlesFromRubrics($rubrics) {
		$articles = [];
			if(!empty($rubrics)) {
				switch($this->context) {
					case 'kr' : $pattern = '#(?:[А-Я][а-я]+ [А-Я]\. [А-Я]\.(?:, [А-Я][а-я]+ [А-Я]\. [А-Я]\.)?)?.+?(?:(?=[А-Я][а-я]+ [А-Я]\. [А-Я]\.(?:, [А-Я][а-я]+ [А-Я]\. [А-Я]\.)?|$))#su'; break;
					case 'peo' : $pattern = '#[А-Я]\. [А-Я]\. [А-Я][а-я]+.+?(?:(?=[А-Я]\. [А-Я]\. [А-Я][а-я]+|$))#su'; break;
					case 'sr' : $pattern = '#(?:[А-Я][а-я]+ [А-Я]\.(?:([А-Я]\.)?)|Ваши* вопросы*).+?(?:(?=[А-Я][а-я]+ [А-Я]\.(?:([А-Я]\.)?)|$|Ваши* вопросы*))#su'; break;
					case 'super' : $pattern = '#([А-Я][а-я]+ [А-Я][а-я]+?\r\n(.+?))(?:(?=[А-Я][а-я]+ [А-Я][а-я]+|$))#su'; break;
					case 'se' : $pattern = '#(?:[А-Я][а-я]+ [А-Я]\.(?:([А-Я]\.)?)|Вопрос — ответ).+?(?:(?=[А-Я][а-я]+ [А-Я]\.(?:([А-Я]\.)?)|$|Вопрос — ответ))#su'; break;
					case 'eco' : $pattern = '#(?:[А-Я]\.(?:[А-Я]\.)? [А-Я][а-я]+)?.+?(?:(?=[А-Я]\.(?:[А-Я]\.) [А-Я][а-я]+ ?|$))#su'; break;
					default : die("Не удалось выбрать шаблон. Метод: ".__METHOD__.". Низвестный контекст: $this->context"); break;
				}
				foreach($rubrics as $rubricName => $rubricText) {
					if($rubricText) {
						preg_match_all($pattern, $rubricText, $matches);
						if(!empty($matches[0])) {
							$articles[$rubricName] = $matches[0];
						} else {
							die("<p>Не удалось разбить текст на статьи из рубрики $rubricName</p><p>Контекст: $this->context</p>");
						}
					} else {
						$articles[$rubricName] = [];
					}
				}
			} else {
				die('Массив рубрик пуст');
			}
		return $articles;
	}

	/**Выделяет из статьи тайтл, ссылку(если есть), автора, текст(если есть)
	 * @param $article
	 * @return mixed
	 */
	private function splitArticleOnElements($article) {
		switch($this->context) {
			case 'peo' : $pattern = '#([А-Я]\. [А-Я]\. [А-Я][а-я]+?)\r\n(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			case 'sr' : $pattern = '#(?:([А-Я][а-я]+ [А-Я]\.(?:[А-Я]\.)?(?: +)??)\r\n)?(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			case 'kr' : $pattern = '#(?:([А-Я][а-я]+ [А-Я]\. (?:[А-Я]\.)?(?:,)?(?: +)?(?:[А-Я][а-я]+ [А-Я]\. (?:[А-Я]\.)?)?)\r\n)?(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			case 'super' : $pattern = '#(?:([А-Я][а-я]+ [А-Я][а-я]+?)\r\n)?(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			case 'se' : $pattern = '#(?:([А-Я][а-я]+ [А-Я]\. (?:[А-Я]\.)?(?: +)??)\r\n)?(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			case 'eco' : $pattern = $this->currRubric == 'ВОПРОС — ОТВЕТ' ? '#()()()(.*)#su' : '#(?:([А-Я]\.(?:[А-Я]\.)? [А-Я][а-я]+(?: +)?)\r\n)?(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su'; break;
			default : die("Не удалось выбрать шаблон. Метод: ".__METHOD__.". Низвестный контекст: $this->context"); break;

		}
		preg_match_all($pattern, $article, $matches);
		if(!in_array($this->currRubric, $this->rubricsWithoutAuthors)) {
			if (!$this->checkEmptyAuthorResolution($matches[2][0], $matches[1][0])) {
				die ("<p>Не удалось извлечь автора из статьи: <br> $article</p><p>Контекст: $this->context</p>");
			}
		}
		if(!in_array($this->currRubric, $this->rubricsWithoutTitles)) {
			if (empty($matches[2][0])) {
				die ("<p>Не удалось извлечь тайтл из статьи: <br> $article</p><p>Контекст: $this->context</p>");
			}
		}

		$splArticle['author'] = empty($matches[1][0]) ? null : trim($matches[1][0]);
		$splArticle['title'] = empty($matches[2][0]) ? null : trim($matches[2][0]);
		$splArticle['link'] = empty($matches[3][0]) ? null : trim($matches[3][0]);
		$splArticle['text'] = empty($matches[4][0]) ? null : trim($matches[4][0]);
		return $splArticle;
	}

	/**
	 * Разбивает текст по абзацам
	 * @param $text
	 */
	private function handleArticlesText($text) {
		$matches[1] = null;
		if($text) {
			preg_match_all('#(.+?)(?:\n|$)#su', $text, $matches);
			if(empty($matches[1])) {
				die ("<p>Не удалось разить текст на абзацы, текст:<br> $text</p><p>Контекст: $this->context</p>");
			}
		}
		return $matches[1];
	}

	private function fetchMagsTexts($text) {
		$mags_text = [];
		switch($this->context) {
			case 'kr' : $pattern =  '#^[A-ZА-ЯЁ —\-\.]{3,}\s.+?(?:(?=( *ТЕМАТИЧЕСКИЕ СТРАНИЦЫ.+)))#msu'; break;
			default : $pattern = null; break;
		}
		if($pattern !== null) {
			preg_match_all($pattern, $text, $matches);
			for ($i = 1; $i < count($matches); $i++) {
				if (empty($matches[$i][0])) {
					die('Не удалось извлечь текст ' . $i . '-го журнала, контекст: ' . $this->context . ', метод: ' . __METHOD__);
				}
			}
			switch($this->context) {
				case 'kr' :
					$mags_text['kr'] = $matches[0][0];
					$mags_text['super'] = $matches[1][0]; break;
				default : $mags_text[$this->context] = $text; break;
			}
		} else {
			$mags_text[$this->context] = $text;
		}

		return $mags_text;
	}

	private function checkEmptyAuthorResolution($articleTitle, $author) {
		if (in_array($articleTitle, $this->articlesWithoutAuthors)) {
			return true;
		} else {
			return !empty($author);
		}
	}

	private function getLayout() {
			$templatePath = "templates/porfiz-digest/mainLayout.php";
			file_exists($templatePath) ? require_once $templatePath : die("Шаблон '$templatePath' отсутсвует");
	}
}