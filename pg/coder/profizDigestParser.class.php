<?php
class profizDigestParser extends Parser {

	public function run() {
		$fetchedRubrics = $this->fetchRubrics();
		$fetchedArticles = $this->fetchArticlesFromRubrics($fetchedRubrics);

		foreach($fetchedArticles as $rubricName => $articles) {
			foreach($articles as $article) {
				$this->splitArticleOnElements($article);
			}
		}
	}

	private function fetchRubrics() {
		$rubrics = [];
		preg_match_all('#^([A-ZА-ЯЁ —]{3,})\s(.+?)(?:(?=\s^[A-ZА-ЯЁ —]{3,}\s|Подробно о журнале))#msu', $this->text, $matches);
		if(!empty($matches[1]) && !empty($matches[2])) {
			for($i = 0; $i < count($matches[1]); $i++) {
				$rubrics[$matches[1][$i]] = trim($matches[2][$i]);
			}
		} else {
			die('Не удалось распарсить текст по рубрикам: не найдено совпадений');
		}
		return $rubrics;
	}

	private function fetchArticlesFromRubrics($rubrics) {
		if(!empty($rubrics)) {
			$articles = [];
			foreach($rubrics as $rubricName => $rubricText) {
				preg_match_all('#[А-Я]\. [А-Я]\. [А-Я][а-я]+.+?(?:(?=[А-Я]\. [А-Я]\. [А-Я][а-я]+|$))#su', $rubricText, $matches);
				if(!empty($matches[0])) {
					$articles[$rubricName]['articles'] = $matches[0];
				} else {
					die("Не удалось разбить текст на статьи из рубрики $rubricName");
				}
			}
			return $articles;
		} else {
			die('Массив рубрик пуст');
		}
	}


	private function splitArticleOnElements($article) {
		preg_match_all('#[А-Я]\. [А-Я]\. [А-Я][а-я]+.+?(?:(?=[А-Я]\. [А-Я]\. [А-Я][а-я]+|$))#su', $article, $matches);
	}

}