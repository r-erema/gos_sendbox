<?php
	/**
	 * Скрипт накатывает права(-g) юзеру(-l). Права: all: -a, view: -v
	 */
	$config = require __DIR__ . '/config.php';
	/** @var PDO $pdo */
	$pdo = require __DIR__ . '/db.php';

	$opts = getopt('l:g:a:v:');

	$login = isset($opts['l']) ? $opts['l'] : null;
	if (!$login) {
		echo 'Не передан логин пользователя' . PHP_EOL;
		exit(1);
	}

	const VIEW_GROUP = 'Биллинг.Просмотр';

	$stmt = $pdo->query("SELECT user_id FROM fn_users WHERE user_login = {$pdo->quote($login)}");
	$stmt->execute();
	$userId = $stmt->fetchColumn();
	if (!$userId) {
		echo "Пользователь {$login} не найден" . PHP_EOL;
		exit(1);
	}

	$allGroups = isset($opts['a']) && (bool) $opts['a'];
	$onlyViewGroup = isset($opts['v']) && (bool) $opts['v'];

	$groupsToAdd = [];

	if ($allGroups) {
		$groupsToAdd = array_map(function ($row) {
				return $row['group_name'];
			},
			$pdo->query('SELECT group_name FROM fn_groups')->fetchAll()
		);
	} elseif ($onlyViewGroup) {
		$groupsToAdd[] = VIEW_GROUP;
	} else {
		$group = isset($opts['g']) ? $opts['g'] : null;
		if (!$group) {
			echo 'Не передана группа в которую надо добавить пользователя' . PHP_EOL;
			exit(1);
		}

		$rows = $pdo->query('SELECT group_id, group_name FROM fn_groups')->fetchAll();
		$groupsNamesIdsMap = [];
		foreach ($rows as $row) {
			$groupsNamesIdsMap[$row['group_name']] = $row['group_id'];
		}

		if (!array_key_exists($group, $groupsNamesIdsMap)) {
			echo "Указана несуществующая группа: {$group}. Доступные группы:" . PHP_EOL;
			echo implode(PHP_EOL, array_keys($groupsNamesIdsMap));
			exit(1);
		}

		$groupsToAdd[] = $group;
	}

	$result = [];
	$stmt = $pdo->prepare('SELECT COUNT(*) FROM fn_users_groups
						   LEFT JOIN fn_groups ON group_id = ug_group_id
						   WHERE group_name = ? AND ug_user_id = ?');
	foreach ($groupsToAdd as $groupToAdd) {
		$res = $stmt->execute([$groupToAdd, $userId]);
		$userAlreadyInGroup = (bool) $stmt->fetchColumn();
		if (!$userAlreadyInGroup) {
			$groupAdded = (bool) $pdo->exec("INSERT INTO fn_users_groups (ug_user_id, ug_group_id)
											 VALUES (
												{$pdo->quote($userId)},
												(SELECT group_id FROM fn_groups WHERE group_name = {$pdo->quote($groupToAdd)})
											 )");
			if ($groupAdded) {
				$result[] = $groupToAdd;
			}
		}
	}

	if (count($result)) {
		echo 'Пользователь добавлен в группы:' . PHP_EOL;
		echo implode(PHP_EOL, $result) . PHP_EOL;
		echo 'Сбросим memcached' . PHP_EOL;
		shell_exec('sudo service memcached restart');
	} else {
		echo 'Пользователь не добавлен ни в одну из групп' . PHP_EOL;
	}

	exit(0);