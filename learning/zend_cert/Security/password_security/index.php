<?php



session_start();

$_SESSION['count'] = $_SESSION['count'] ?? 0;
$_SESSION['count']++;
$pass = 'mmm_beer11';
if (!isset($_SESSION['hashedPass'])) {
    $_SESSION['hashedPass'] = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 5]);
}

if (($_SESSION['count'] > 1) && ($_SESSION['count'] % 5 === 0)) {
    $oldHash = $_SESSION['hashedPass'];
    password_needs_rehash($_SESSION['hashedPass'], PASSWORD_DEFAULT);
    $_SESSION['hashedPass'] = password_hash($pass, PASSWORD_DEFAULT);
    echo $oldHash !== $_SESSION['hashedPass'] ? 'Pass rehashed<br />' : null;
}

echo (password_verify($_GET['pass'], $_SESSION['hashedPass']) ? '<span style="color: #238b1a">Pass valid</span>' : '<span style="color: #ff1c13">Pass valid not valid</span>') .'<br />';