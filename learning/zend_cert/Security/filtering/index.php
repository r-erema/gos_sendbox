<?php

$echoStatusFriendly = function (bool $status): string {
    return ($status ? '<span style="color: #238b1a">validated</span>' : '<span style="color: #ff1c13">not validated</span>') . '<br />';
};

$echoUpdatedString = function (string $string): string {
    return "<span style=\"color: #238b1a\">{$string}</span>" . '<br />';
};

echo "Validate e-mail({$_GET['email']}) by filter_input: {$echoStatusFriendly(filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL))}";

echo "Validate int({$_GET['int']}) by filter_input: {$echoStatusFriendly(
    filter_input(INPUT_GET, 'int', FILTER_VALIDATE_INT, [
        'options' => [
            'min_range' => 1,
            'max_range' => 105
        ],
        'flags' => 'FILTER_FLAG_ALLOW_HEX'
    ])
)}";

echo "Validate e-mail({$_GET['email']}) by filter_var: {$echoStatusFriendly(filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))}";

foreach (
    filter_input_array(INPUT_GET, [
        'toDB' => FILTER_SANITIZE_MAGIC_QUOTES,
        'bool' => FILTER_VALIDATE_BOOLEAN
    ]) as $k => $v) {
    if (is_bool($v)) {
        echo "Validate {$k}({$_GET[$k]}) by filter_input_array: {$echoStatusFriendly($v)}";
    } elseif (is_string($v)) {
        echo "Updated {$k}({$_GET[$k]}) filter_input_array: {$echoUpdatedString($v)}";
    }
}

$toDb = $_GET['toDB'];
$bool = $_GET['bool'];
foreach (
    filter_var_array([
        'toDB' => $toDb,
        'bool' => $bool
    ], [
        'toDB' => FILTER_SANITIZE_MAGIC_QUOTES,
        'bool' => FILTER_VALIDATE_BOOLEAN
    ]) as $k => $v) {
    if (is_bool($v)) {
        echo "Validate {$k}({$_GET[$k]}) by filter_var_array: {$echoStatusFriendly($v)}";
    } elseif (is_string($v)) {
        echo "Updated {$k}({$_GET[$k]}) filter_var_array: {$echoUpdatedString($v)}";
    }
}