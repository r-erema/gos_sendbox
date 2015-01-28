<?php
namespace MyProject {
const CONNECT_OK = 1;
class Connection {public static function start() {return 'started...';}}
function connect(){}
}


namespace AnotherProject {
const CONNECT_OK = 1;
class Connection {public static function start() {return 'started too...';}}
function connect(){}
}

namespace {
session_start();
$a = MyProject\connect();
echo MyProject\Connection::start();
echo AnotherProject\Connection::start();
}