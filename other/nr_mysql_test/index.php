<?php
/*spl_autoload_register(function ($class) {

});*/

set_include_path(
    $_SERVER['DOCUMENT_ROOT'].'/vendor/ZendFW/library' . PATH_SEPARATOR .
    get_include_path()
);
require_once 'Zend/Db.php';
$db = Zend_Db::factory( 'PDO_MYSQL', [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '8810029011Yaroma',
    'dbname' => 'nr'
]);

$select = $db->select()->from('nr_orders');
$select->joinLeft('nr_codes', 'nr_codes.code_order_id = nr_orders.order_id');
$select->joinLeft('nr_actions', 'nr_actions.action_order_id = nr_orders.order_id');
$select->columns('count(DISTINCT nr_codes.code_id) as codes_count');
//$select->columns('sum(nr_actions.action_order_id = nr_orders.order_id) as actions_count');
$select->columns('count(DISTINCT nr_actions.action_id) as actions_count');
//$select->where('nr_actions.action_action IN (\'library.search\', \'library.document\')');
$select->group('nr_orders.order_id');
$sql = $select->__toString();
$rows = $select->query()->fetchAll();
$f = 1;

//Zend_Loader_Autoloader::getInstance();