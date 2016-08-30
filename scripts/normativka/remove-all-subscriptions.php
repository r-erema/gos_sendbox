<?php

	$config = require __DIR__ . '/config.php';
	/** @var PDO $pdo */
	$pdo = require __DIR__ . '/db.php';

	$opts = getopt('l:');
	$login = isset($opts['l']) ? $opts['l'] : $config['my_login'];

	$stmt = $pdo->query("SELECT user_id FROM fn_users WHERE user_login = {$pdo->quote($login)}");
	$stmt->execute();
	$userId = $stmt->fetchColumn();


	$stmt = $pdo->query("UPDATE nr_codes SET code_is_active = 0 WHERE code_activated_user_id = {$pdo->quote($userId)} AND code_is_active = 1");
	$stmt->execute();
	$result[] = "Дективировано кодов: {$stmt->rowCount()}";

	$shellCommands = require __DIR__ . '/normativka-cli-init.php';
	$shellCommands .= "/usr/bin/php5.6 {$config['normativka_portal_path']}/cli.php http://\${DOMAIN_NORMATIVKA}/services/deactivate/ --cwd=\${PORTAL_ROOT_PATH}". PHP_EOL;
	shell_exec($shellCommands);

	$stmt = $pdo->query("UPDATE nr_codes SET code_activated_user_id = NULL
						 WHERE code_activated_user_id = {$pdo->quote($userId)}");
	$stmt->execute();

	$stmt = $pdo->query("SELECT order_id FROM nr_orders WHERE order_user_id = {$pdo->quote($userId)};");
	$stmt->execute();
	$orders = $stmt->fetchAll();

	if (count($orders)) {
		$ordersIdsString = implode( ',', array_map( function ( $order ) use ( $pdo ) {
			return $pdo->quote( $order['order_id'] );
		}, $orders ) );
		$stmt            = $pdo->query( "SELECT payment_id FROM nr_payments
						 LEFT JOIN nr_invoices ON invoice_id = payment_invoice_id
						 LEFT JOIN nr_orders ON order_id = invoice_order_id
						 WHERE order_id IN ({$ordersIdsString}); " );
		$stmt->execute();
		$payments = $stmt->fetchAll();

		$paymentsIdsString = implode( ',', array_map( function ( $payment ) use ( $pdo ) {
			return $pdo->quote( $payment['order_id'] );
		}, $payments ) );
		$stmt              = $pdo->query( "DELETE FROM nr_payments WHERE payment_id IN ({$paymentsIdsString});" );
		$stmt->execute();
		$result[] = "Удалено оплат: {$stmt->rowCount()}";

		$stmt = $pdo->query( "DELETE FROM nr_invoices WHERE invoice_order_id IN ({$ordersIdsString});" );
		$stmt->execute();
		$result[] = "Удалено счетов: {$stmt->rowCount()}";

		$stmt = $pdo->query( "DELETE FROM nr_codes WHERE code_order_id IN ({$ordersIdsString});" );
		$stmt->execute();
		$result[] = "Удалено кодов: {$stmt->rowCount()}";

		$stmt = $pdo->query( "DELETE FROM nr_orders WHERE order_id IN ({$ordersIdsString});" );
		$stmt->execute();
		$result[] = "Удалено заказов: {$stmt->rowCount()}";
	}
	echo implode(PHP_EOL, $result) . PHP_EOL;
	exit(0);