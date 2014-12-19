<?php
class profizDigestParser extends Parser {

	/**
	 *
	 */
	public function run() {
		//Разбиваем весь текст на рубрики
		$fetchedRubrics = $this->fetchRubrics();
		//Разбиваем каждую рубрику на статьи
		$fetchedArticles = $this->fetchArticlesFromRubrics($fetchedRubrics);

		//Выделяему в каждой статье тайтл, ссылку, автора, основной текст...
		foreach($fetchedArticles as $rubricName => $articles) {
			foreach($articles as $article) {
				$splitArticles[$rubricName][] = $this->splitArticleOnElements($article);
			}
		}

		foreach($splitArticles as $rubricName => &$articles) {
			foreach($articles as &$article) {
				$article['text'] = $this->handleArticlesText($article['text']);
			}
		}
		$this->parsed = $splitArticles;
	}

	/**
	 * Вытягиваеттекст рубрик из всего текста
	 * @return array
	 */
	private function fetchRubrics() {
		$rubrics = [];
		preg_match_all('#^([A-ZА-ЯЁ —\-\.]{3,})\s(.+?)(?:(?=\s^[A-ZА-ЯЁ —\-\.]{3,}\s|Подробно о журнале))#msu', $this->text, $matches);
		if(!empty($matches[1]) && !empty($matches[2])) {
			for($i = 0; $i < count($matches[1]); $i++) {
				$rubrics[$matches[1][$i]] = trim($matches[2][$i]);
			}
		} else {
			die('Не удалось распарсить текст по рубрикам: не найдено совпадений');
		}
		return $rubrics;
	}

	/**
	 * Вытягивает статьи из каждой рубрики по отдельности
	 * @param $rubrics
	 * @return array
	 */
	private function fetchArticlesFromRubrics($rubrics) {
		if(!empty($rubrics)) {
			$articles = [];
			foreach($rubrics as $rubricName => $rubricText) {
				preg_match_all('#[А-Я]\. [А-Я]\. [А-Я][а-я]+.+?(?:(?=[А-Я]\. [А-Я]\. [А-Я][а-я]+|$))#su', $rubricText, $matches);
				if(!empty($matches[0])) {
					$articles[$rubricName] = $matches[0];
				} else {
					die("Не удалось разбить текст на статьи из рубрики $rubricName");
				}
			}
			return $articles;
		} else {
			die('Массив рубрик пуст');
		}
	}

	/**Выделяет из статьи тайтл, ссылку(если есть), автора, текст(если есть)
	 * @param $article
	 * @return mixed
	 */
	private function splitArticleOnElements($article) {
		preg_match_all('#([А-Я]\. [А-Я]\. [А-Я][а-я]+?)\r\n(.+?)(?:\r\n|$)(http:.+?\r\n)?(.+)?#su', $article, $matches);
		if (empty($matches[1][0])) {
			die ("Не удалось извлечь автора из статьи: <br> $article");
		} elseif (empty($matches[2][0])) {
			die ("Не удалось извлечь тайтл из статьи: <br> $article");
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
				die ("Не удалось разить текст на абзацы, текст:<br> $text");
			}
		}
		return $matches[1];
	}
}