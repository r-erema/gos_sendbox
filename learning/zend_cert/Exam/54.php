
<?php
/*
Consider the following table data and PHP code, and assume that the database supports
transactions. What is the outcome? Table data (table name "users" with primary key "id"): id
name email ——- ———– ——————- 1 anna alpha@example.com 2 betty
beta@example.org 3 clara gamma@example.net 5 sue sigma@example.info PHP code
(assume the PDO connection is correctly established): $dsn =
'mysql:host=localhost;dbname=exam'; $user = 'root'; $pass = '8810029011Yaroma'; $pdo = new
PDO($dsn, $user, $pass); try { $pdo->exec("INSERT INTO users (id, name, email)
VALUES (6, 'bill', 'delta@example.com')"); $pdo->begin(); $pdo->exec("INSERT INTO users
(id, name, email) VALUES (7, 'john', 'epsilon@example.com')"); throw new Exception(); }
catch (Exception $e) { $pdo->rollBack(); }

A.
Both user 'bill' and user 'john' will be inserted.

B.
Neither user 'bill' nor user 'john' will be inserted.

C.
The user 'bill' will be inserted, but the user 'john' will not be.

D.
The user 'bill' will not be inserted, but the user 'john' will be.

Answer: C.
The user 'bill' will be inserted, but the user 'john' will not be.

*/

echo '53. Consider the following table data and PHP code, and assume that the database supports
transactions. What is the outcome? Table data (table name "users" with primary key "id"):
id name email
1 anna alpha@example.com
2 betty beta@example.org
3 clara gamma@example.net
5 sue sigma@example.

info PHP code
(assume the PDO connection is correctly established): $dsn =
\'mysql:host=localhost;dbname=exam\'; $user = \'root\'; $pass = \'8810029011Yaroma\'; $pdo = new
PDO($dsn, $user, $pass); try { $pdo->exec("INSERT INTO users (id, name, email)
VALUES (6, \'bill\', \'delta@example.com\')"); $pdo->begin(); $pdo->exec("INSERT INTO users
(id, name, email) VALUES (7, \'john\', \'epsilon@example.com\')"); throw new Exception(); }
catch (Exception $e) { $pdo->rollBack(); }' . PHP_EOL;

$dsn = 'mysql:host=localhost;dbname=exam';
$user = 'root';
$pass = '8810029011Yaroma';
/*$pdo = new PDO($dsn, $user, $pass);
try {
    $pdo->exec("INSERT INTO users (id, name, email) VALUES (6, 'bill', 'delta@example.com')");
    $pdo->beginTransaction();
    $pdo->exec("INSERT INTO users (id, name, email) VALUES (7, 'john', 'epsilon@example.com')");
    throw new Exception();
} catch (Exception $e) {
    $pdo->rollBack();
}*/