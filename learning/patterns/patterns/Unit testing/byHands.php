<?php



require_once 'UserStore.php';
require_once 'Validator.php';

$store = new UserStore();
$store->addUser('Bob Williams', 'bob@example.com', '12345');

$validator = new Validator($store);
if ($validator->validateUser('bob@example.com', '123452')) {
    echo 'Hi!!!' . PHP_EOL;
}
var_dump($store->getUser('bob@example.com'));