
<?php
/*
Consider the following table data and PHP code. What is a possible outcome? Table data
(table name "users" with primary key "id"): id name email ——- ———– ——————- 1
anna alpha@example.com 2 betty beta@example.org 3 clara gamma@example.net 5 sue
sigma@example.info PHP code (assume the PDO connection is correctly established):
$dsn = 'mysql:host=localhost;dbname=exam'; $user = 'root'; $pass = '8810029011Yaroma'; $pdo =
new PDO($dsn, $user, $pass); $cmd = "SELECT name, email FROM users LIMIT 1"; $stmt
= $pdo->prepare($cmd); $stmt->execute(); $result = $stmt->fetchAll(PDO::FETCH_BOTH);
$row = $result[0];

A.
The value of $row is `array(0 => 'anna', 1 => 'alpha@example.com')`.

B.
The value of $row is `array('name' => 'anna', 'email' => 'alpha@example.com')`.

C.
The value of $row is `array(0 => 'anna', 'name' => 'anna', 1 => 'alpha@example.com',
'email' => 'alpha@example.com')`.

D.
The value of $result is `array('anna' => 'alpha@example.com')`.

Answer: C.
The value of $row is `array(0 => 'anna', 'name' => 'anna', 1 => 'alpha@example.com',
'email' => 'alpha@example.com')`.

*/

echo '53. Consider the following table data and PHP code. What is a possible outcome? Table data
(table name "users" with primary key "id"):
id name email
1 anna alpha@example.com
2 betty beta@example.org
3 clara gamma@example.net
5 sue sigma@example.

info PHP code (assume the PDO connection is correctly established):
$dsn = \'mysql:host=localhost;dbname=exam\'; $user = \'root\'; $pass = \'8810029011Yaroma\'; $pdo =
new PDO($dsn, $user, $pass); $cmd = "SELECT name, email FROM users LIMIT 1"; $stmt
= $pdo->prepare($cmd); $stmt->execute(); $result = $stmt->fetchAll(PDO::FETCH_BOTH);
$row = $result[0];' . PHP_EOL;

$dsn = 'mysql:host=localhost;dbname=exam';
$user = 'root';
$pass = '8810029011Yaroma';
$pdo = new PDO($dsn, $user, $pass);
$cmd = "SELECT name, email FROM users LIMIT 1";
$stmt = $pdo->prepare($cmd);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_BOTH);
$row = $result[0];