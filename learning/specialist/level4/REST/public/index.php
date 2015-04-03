<?php
require '../vendor/autoload.php';
require '../vendor/notorm-master/NotORM.php';



$pdo = new PDO("sqlite:../vendor/rest.db");
$db = new NotORM($pdo);

$app = new \Slim\Slim();

$app->get("/", function () {
	echo 'Something by default!';
});

$app->get("/books/", function () use ($app, $db) {
	$books = [];
	foreach ($db->books() as $book) {
		$books[] = [
			'id' => $book['id'],
			'title' => $book['title'],
			'author' => $book['author'],
			'summary' => $book['summary']
		];
	}
	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	echo json_encode($books);
});

$app->get("/book/:id/", function ($id) use ($app, $db) {
	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$book = $db->books()->where('id', $id);
	if ($data = $book->fetch()) {
		echo json_encode([
			'id' => $data['id'],
			'title' => $data['title'],
			'author' => $data['author'],
			'summary' => $data['summary']
		]);
	} else {
		echo json_encode([
			'status' => 1,
			'message' => "Book ID $id doesn't exist"
		]);
	}
});

$app->get('/add/', function () use ($app, $db) {
	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$book = $app->request()->post();
	$result = $db->books->insert($book);
	echo json_encode([
		'id' => $result['id']
	]);
});

$app->get('/book/update/:id/', function ($id) use ($app, $db) {
	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$book = $db->books()->where('id', $id);
	if ($book->fetch()) {
		$post = $app->request()->put();
		$result = $book->update($post);
		echo json_encode([
			'status' => 1,
			'message' => 'Book update successfully'
		]);
	} else {
		echo json_encode([
			'status' => 0,
			'message' => "Book id $id does not exist"
		]);
	}
});

$app->get('/book/delete/:id/', function ($id) use ($app, $db) {
	$res = $app->response();
	$res['Content-Type'] = 'application/json';
	$book = $db->books()->where('id', $id);
	if ($book->fetch()) {
		$result = $book->delete();
		echo json_encode([
			'status' => 1,
			'message' => 'Book delete successfully'
		]);
	} else {
		echo json_encode([
			'status' => 0,
			'message' => "Book id $id does not exist"
		]);
	}
});

$app->run();