
<?php

/*
Is the following code vulnerable to SQL Injection ($mysqli is an instance of the MySQLi
class)? $age = $mysqli->real_escape_string($_GET['age']); $name =
$mysqli->real_escape_string($_GET['name']); $query = "SELECT * FROM `table` WHERE
name LIKE '$name' AND age = $age"; $results = $mysqli->query($query);

A.
No, the code is fully protected from SQL Injection.

B.
Yes, because you cannot prevent SQL Injection when using MySQLi

C.
Yes, because the $age variable is improperly escaped.

D.
Yes, because the $name variable is improperly escaped.

E.
Yes, because the $name variable and the $age variable is improperly escaped.

Answer: C.
Yes, because the $age variable is improperly escaped.

*/
echo '117. Is the following code vulnerable to SQL Injection ($mysqli is an instance of the MySQLi
class)? $age = $mysqli->real_escape_string($_GET[\'age\']); $name =
$mysqli->real_escape_string($_GET[\'name\']); $query = "SELECT * FROM `table` WHERE
name LIKE \'$name\' AND age = $age"; $results = $mysqli->query($query);' . PHP_EOL;

/*
$age =  $mysqli->real_escape_string($_GET['age']);
$name = $mysqli->real_escape_string($_GET['name']);
$query = "SELECT * FROM `table` WHERE name LIKE '$name' AND age = $age";
$results = $mysqli->query($query);
*/