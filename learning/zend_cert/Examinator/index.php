<?php
$pdo = new PDO('sqlite:'. __DIR__ .'/data/db.sqlite');

$getRandomQuestion = function () use ($pdo) {
    $stmt = $pdo->query('SELECT id FROM questions;');
    $stmt->execute();

    $questionsToRand = [];
    for ($i = 1; $i <= 223; $i++) {
        $questionsToRand["{$i}"] = $i;
    }

    while ($id = $stmt->fetchColumn()) {
        unset($questionsToRand[$id]);
    }

    return array_rand($questionsToRand);
};

/**
 * @return array
 */
$getQuestions = function () use ($pdo): array {
    $stmtQuestion = $pdo->query('
                          SELECT questions.id, questions.text FROM questions
                          LEFT JOIN rubrics ON rubrics.id = questions.rubric_id
                        ');
    $stmtQuestion->execute();

    $stmtAnswers = $pdo->prepare('SELECT * FROM answers WHERE id_question = ?');
    $questions = [];
    while ($question = $stmtQuestion->fetch(PDO::FETCH_ASSOC)) {
        $stmtAnswers->execute([$question['id']]);
        $question['answers'] = $stmtAnswers->fetchAll(PDO::FETCH_ASSOC);
        $questions[] = $question;
    }
    return $questions;
};

foreach ($getQuestions() as $question) {
    $questionText = "<pre>{$question['id']}. {$question['text']}" . PHP_EOL;
    $questionText .= str_repeat('-', 100) . PHP_EOL . PHP_EOL;
    for ($i = 0, $count = count($question['answers']); $i < $count; $i++) {
        $questionText .=  ($i + 1) . ". {$question['answers'][$i]['text']}" . PHP_EOL;
    }
    $questionText .= str_repeat('=', 100) . PHP_EOL . PHP_EOL . PHP_EOL;
    $questionText .= '</pre>';
    echo $questionText;
}

echo $getRandomQuestion();
/*
$q = <<<TEXT
When using password_hash() with the PASSWORD_DEFAULT algorithm constant, which of the following is true? (Choose 2)

A.
The algorithm that is used for hashing passwords can change when PHP is upgraded.

B.
The salt option should always be set to a longer value to account for future algorithm 
requirements.

C.
The string length of the returned hash can change over time.

D.
The hash algorithm that’s used will always be compatible with crypt() .
TEXT;*/
