
<?php
/*
Consider the following code. Which keyword should be used in the line marked with
“KEYWORD” instead of “self” to make this code work as intended? abstract class Base {
protected function __construct() { } public static function create() { return new self(); //
KEYWORD } abstract function action(); } class Item extends Base { public function action() {
echo __CLASS__; } } $item = Item::create(); $item->action(); // outputs “Item”

A.
static

Answer: A
static

*/

echo '32. Consider the following code. Which keyword should be used in the line marked with
“KEYWORD” instead of “self” to make this code work as intended? abstract class Base {
protected function __construct() { } public static function create() { return new self(); //
KEYWORD } abstract function action(); } class Item extends Base { public function action() {
echo __CLASS__; } } $item = Item::create(); $item->action(); // outputs “Item”' . PHP_EOL;
abstract class Base {
    protected function __construct() {}
    public static function create() {
        return new static();//KEYWORD
    }
    abstract function action();
}

class Item extends Base {
    public function action() {
        echo __CLASS__;
    }
}

$item = Item::create();
$item->action(); // outputs “Item”
echo PHP_EOL . 'static';