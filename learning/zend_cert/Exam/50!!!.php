
<?php
/*
Consider the following table data and PHP code. What is the outcome? Table data (table
name "users" with primary key "id"): id name email ——- ———– ——————- 1 anna
alpha@example.com 2 betty beta@example.org 3 clara gamma@example.net 5 sue
sigma@example.info PHP code (assume the PDO connection is correctly established):

$dsn = 'mysql:host=localhost;dbname=exam'; $user = 'username'; $pass = '********'; $pdo =
new PDO($dsn, $user, $pass); $cmd = "SELECT * FROM users WHERE id = :id"; $stmt =
$pdo->prepare($cmd); $id = 3; $stmt->bindParam('id', $id); $stmt->execute();
$stmt->bindColumn(3, $result); $row = $stmt->fetch(PDO::FETCH_BOUND);

A.
The database will return no rows.

B.
The value of $row will be an array.

C.
The value of $result will be empty.

D.
The value of $result will be 'gamma@example.net'.

Answer: D
The value of $result will be ‘gamma@example.net’.

*/

echo '50. Consider the following table data and PHP code. What is the outcome? Table data (table
name "users" with primary key "id"): 
id name email 
1 anna alpha@example.com
2 betty beta@example.org
3 clara gamma@example.net
5 sue sigma@example.

info PHP code (assume the PDO connection is correctly established):
$dsn = \'mysql:host=localhost;dbname=exam\'; $user = \'username\'; $pass = \'********\'; $pdo =
new PDO($dsn, $user, $pass); $cmd = "SELECT * FROM users WHERE id = :id"; $stmt =
$pdo->prepare($cmd); $id = 3; $stmt->bindParam(\'id\', $id); $stmt->execute();
$stmt->bindColumn(3, $result); $row = $stmt->fetch(PDO::FETCH_BOUND);' . PHP_EOL;

$dsn = 'mysql:host=localhost;dbname=exam';
$user = 'username';
$pass = '********';
$pdo = new PDO($dsn, $user, $pass);
$cmd = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($cmd);
$id = 3;
$stmt->bindParam('id', $id);
$stmt->execute();
$stmt->bindColumn(3, $result);
$row = $stmt->fetch(PDO::FETCH_BOUND);