
<?php
/*
Consider the following table data and PHP code. What is the outcome? Table data (table
name “users” with primary key “id”): id name email ——- ———– ——————- 1 anna
alpha@example.com 2 betty beta@example.org 3 clara gamma@example.net 5 sue
sigma@example.info PHP code (assume the PDO connection is correctly established):
$dsn = ‘mysql:host=localhost;dbname=exam’; $user = ‘username’; $pass = ‘********’; $pdo =
new PDO($dsn, $user, $pass); try { $cmd = “INSERT INTO users (id, name, email)
VALUES (:id, :name, :email)”; $stmt = $pdo->prepare($cmd); $stmt->bindValue(‘id’, 1);
$stmt->bindValue(‘name’, ‘anna’); $stmt->bindValue(’email’, ‘alpha@example.com’);
$stmt->execute(); echo “Success!”; } catch (PDOException $e) { echo “Failure!”; throw $e; }

A.
The INSERT will fail because of a primary key violation, and the user will see the
“Success!” message.

B.
The INSERT will fail because of a primary key violation, and the user will see a PDO
warning message.

C.
The INSERT will succeed and the user will see the “Success!” message.

D.
The INSERT will fail because of a primary key violation, and the user will see the “Failure!” message.

Answer: D
The INSERT will fail because of a primary key violation, and the user will see the “Failure!” message.

*/

echo '52. Consider the following table data and PHP code. What is the outcome? Table data (table
name "users" with primary key "id"):
id name email
1 anna alpha@example.com
2 betty beta@example.org
3 clara gamma@example.net
5 sue sigma@example

info PHP code (assume the PDO connection is correctly established):
$dsn = \'mysql:host=localhost;dbname=exam\'; $user = \'username\'; $pass = \'********\'; $pdo =
new PDO($dsn, $user, $pass); try { $cmd = "INSERT INTO users (id, name, email)
VALUES (:id, :name, :email)"; $stmt = $pdo->prepare($cmd); $stmt->bindValue(\'id\', 1);
$stmt->bindValue(\'name\', \'anna\'); $stmt->bindValue(\'email\', \'alpha@example.com\');
$stmt->execute(); echo "Success!"; } catch (PDOException $e) { echo "Failure!"; throw $e; }' . PHP_EOL;

$dsn = 'mysql:host=localhost;dbname=exam';
$user = 'username';
$pass = '********';
$pdo = new PDO($dsn, $user, $pass);

try {
    $cmd = "INSERT INTO users (id, name, email) VALUES (:id, :name, :email)";
    $stmt = $pdo->prepare($cmd);
    $stmt->bindValue('id', 1);
    $stmt->bindValue('name', 'anna');
    $stmt->bindValue('email', 'alpha@example.com');
    $stmt->execute();
    echo "Success!";
} catch (PDOException $e) {
    echo "Failure!"; throw $e;
}