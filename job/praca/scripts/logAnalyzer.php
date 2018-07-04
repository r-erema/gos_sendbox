<?php
/* mongo query

	records = [];
	var cursor = db.getCollection('action-log7').find({
		user: 386899
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));

	records = [];
	var cursor = db.getCollection('action-log7').find({
		"params.vacancy": "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));


	/////////////////////////
	records = [];
	var cursor = db.getCollection('vacancies-status-toggling').find({
		user_id: 386899
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));

 */
require_once __DIR__ . '/../../../vendor/autoload.php';

$log = '[
	{
		"_id" : ObjectId("598b16a066638e5d1715441e"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.187.66",
		"request" : "d5b20bef-21ec-035c-c6f6-ce24ff7445eb",
		"__time" : ISODate("2017-08-09T14:05:20.033Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("598b16a066638e5d17154423"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.187.66",
		"request" : "d5b20bef-21ec-035c-c6f6-ce24ff7445eb",
		"__time" : ISODate("2017-08-09T14:05:20.313Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("599ab4a066638e645c4fb396"),
		"method" : "Praca\\Api\\Impl\\Employer::updateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.190.164",
		"request" : "812c89be-c3d7-a1c4-bdb2-0380fd7c9a27",
		"__time" : ISODate("2017-08-21T10:23:28.113Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59afbe2866638e6f0a2eef0b"),
		"method" : "Praca\\Api\\Impl\\Employer::updateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.191.185",
		"request" : "59d8d64b-9a39-2d3f-14be-68a81d7ed9d8",
		"__time" : ISODate("2017-09-06T09:21:44.108Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59afbf3a66638e6dee7d2de9"),
		"method" : "Praca\\Api\\Impl\\Employer::updateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 413822,
		"ip" : "134.17.24.214",
		"request" : "43beffb4-e286-d1bb-025c-a7ed04486883",
		"__time" : ISODate("2017-09-06T09:26:18.232Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59b138e366638e51787ecb84"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.191.185",
		"request" : "e147c519-9a7a-ba9c-c083-5b80d1997117",
		"__time" : ISODate("2017-09-07T12:17:39.580Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59e07dce66638e757711a7e6"),
		"method" : "Praca\\Api\\Impl\\Employer::updateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.188.237",
		"request" : "e3d95f58-ca49-c59f-ed60-03a89d35cf70",
		"__time" : ISODate("2017-10-13T08:48:14.815Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59e07ed266638e0b400df00d"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.188.237",
		"request" : "6f418bad-646b-f823-74d4-98f827c07e53",
		"__time" : ISODate("2017-10-13T08:52:34.714Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59e07ed266638e0b400df00f"),
		"method" : "Praca\\Api\\Impl\\Employer::upVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.188.237",
		"request" : "6f418bad-646b-f823-74d4-98f827c07e53",
		"__time" : ISODate("2017-10-13T08:52:34.826Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59e07ed266638e0b400df011"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.188.237",
		"request" : "6f418bad-646b-f823-74d4-98f827c07e53",
		"__time" : ISODate("2017-10-13T08:52:34.931Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59edd64066638e3cf404dabf"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.188.200",
		"request" : "7c868774-fefa-7b80-549a-9b1abaf0e0a8",
		"__time" : ISODate("2017-10-23T11:45:04.064Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59f6ef0266638e4c1e465c80"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.196.108",
		"request" : "baee3ff9-9ad7-a346-6ec9-e7c0fbba2cd8",
		"__time" : ISODate("2017-10-30T09:21:06.109Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59f6ef0266638e4c1e465c82"),
		"method" : "Praca\\Api\\Impl\\Employer::upVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.196.108",
		"request" : "baee3ff9-9ad7-a346-6ec9-e7c0fbba2cd8",
		"__time" : ISODate("2017-10-30T09:21:06.249Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("59f6ef0266638e4c1e465c83"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.196.108",
		"request" : "baee3ff9-9ad7-a346-6ec9-e7c0fbba2cd8",
		"__time" : ISODate("2017-10-30T09:21:06.326Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a02f8f966638e03dd0207db"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.196.108",
		"request" : "3a3fa381-d1bb-3022-5cac-1efaf04eb44b",
		"__time" : ISODate("2017-11-08T12:30:49.175Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a0d55c866638e3dd366ddd0"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.226.92",
		"request" : "73655761-f3b4-c905-fd3b-0d83eb4b1c38",
		"__time" : ISODate("2017-11-16T09:09:28.900Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a0d55c966638e3dd366ddd2"),
		"method" : "Praca\\Api\\Impl\\Employer::upVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.226.92",
		"request" : "73655761-f3b4-c905-fd3b-0d83eb4b1c38",
		"__time" : ISODate("2017-11-16T09:09:29.038Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a0d55c966638e3dd366ddd5"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.226.92",
		"request" : "73655761-f3b4-c905-fd3b-0d83eb4b1c38",
		"__time" : ISODate("2017-11-16T09:09:29.165Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a1728fb66638e3a71602548"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.194.156",
		"request" : "1e2797f6-a413-ad7f-5c4f-0e7202fe8b7c",
		"__time" : ISODate("2017-11-23T20:00:59.494Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a96491866638e4af33c9d71"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.199.254",
		"request" : "90a84c63-ae8a-d4b9-4958-17ef889400eb",
		"__time" : ISODate("2018-02-28T06:15:52.533Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a96491966638e4af33c9d73"),
		"method" : "Praca\\Api\\Impl\\Employer::upVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.199.254",
		"request" : "90a84c63-ae8a-d4b9-4958-17ef889400eb",
		"__time" : ISODate("2018-02-28T06:15:53.034Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5a96491966638e4af33c9d76"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.199.254",
		"request" : "90a84c63-ae8a-d4b9-4958-17ef889400eb",
		"__time" : ISODate("2018-02-28T06:15:53.153Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5ad71eb566638e176e71ee4b"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.225.245",
		"request" : "47b32b88-8a21-e102-f9b5-6a17dbc6a4df",
		"__time" : ISODate("2018-04-18T10:32:21.898Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b17de9b66638e7f6657d220"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"type" : "free"
		},
		"user" : 386899,
		"ip" : "46.56.230.121",
		"request" : "9b435bb4-f94a-a358-7278-bfb8152e265c",
		"__time" : ISODate("2018-06-06T13:16:11.746Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b17de9b66638e7f6657d222"),
		"method" : "Praca\\Api\\Impl\\Employer::upVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]"
		},
		"user" : 386899,
		"ip" : "46.56.230.121",
		"request" : "9b435bb4-f94a-a358-7278-bfb8152e265c",
		"__time" : ISODate("2018-06-06T13:16:11.950Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b17de9c66638e7f6657d225"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#185207]",
			"enabled" : false
		},
		"user" : 386899,
		"ip" : "46.56.230.121",
		"request" : "9b435bb4-f94a-a358-7278-bfb8152e265c",
		"__time" : ISODate("2018-06-06T13:16:12.089Z"),
		"__namespace" : "logger"
	}
]
';


$log = preg_replace('#"_id".*#', '', $log);
$log = preg_replace('#"__time".*?ISODate\("(.*?)T(.*?)?"\)#', '"__time" : "$1 $2"', $log);
$log = preg_replace('#"time".*?ISODate\("(.*?)T(.*?)?"\)#', '"__time" : "$1 $2"', $log);

$log = str_replace([
	'\\',
	'Praca\Api\Impl\User::approveUser',
	'Praca\Api\Impl\Employer::approveContact',
	'Praca\Api\Impl\Employer::updateOrganization',
	'Praca\Api\Impl\Employer::updateOrganization',
], [
	'_',
	'Подтверждение юзера',
	'Подтверждение контакта',
	'Редактирование организации',
], $log);

$decodedLog = json_decode($log, true);

foreach ($decodedLog as $i => $item) {

	if (isset($item['__namespace']) && $item['__namespace'] === 'authorize') {
		echo 'Вход на сайт/переход на страницу/обновление страницы' . PHP_EOL;
	} elseif (isset($item['method']) && preg_match('#Praca#', $item['method'])) {
		$item['method'] = preg_replace('#^.*:#', '', $item['method']);
		echo $item['method'] . PHP_EOL;
	}
	//echo 'assolatolena2017@gmail.com.log' . PHP_EOL;
	$user = 386899;
	if (isset($item['user_id'])) {
		echo $item['user_id'] == $user ? "Пользователь: ania.valentinowna@yandex.ru" . PHP_EOL : $item['user_id'] . PHP_EOL;
	}
	if ($item['user']) {
		echo $item['user'] == $user ? "Пользователь: ania.valentinowna@yandex.ru" . PHP_EOL : $item['user'] . PHP_EOL;
	}

	if (isset($item['params'])) {
		foreach ($item['params'] as $k => $v) {
			if (preg_match('/\[\#([\d]+)\]/', $v, $matches)) {
				$v = $matches[1] ?? $v;
				echo "{$k}: {$v}" . PHP_EOL;
			}
		}
	}
	/*if (isset($item['method']) && $item['method'] === 'changeVacancyAutoUp') {
		preg_match('/\[#([\d]+)\]/', $item['params']['vacancy'], $matches);
		echo "Вакансия: {$matches[1]}" . PHP_EOL;
		echo 'Статус: ' . ($item['params']['enabled'] ? 'включение' : 'выключение') . PHP_EOL;
	}*/

	echo isset($item['action']) ? "Действие: {$item['action']}" . PHP_EOL : '';
	echo isset($item['vacancy_id']) ? "Id вакансии: {$item['vacancy_id']}" . PHP_EOL : '';
	//echo isset($item['time']) ? $item['time'] . PHP_EOL : '';
	echo isset($item['__time']) ? $item['__time'] . PHP_EOL : '';
	echo isset($item['ip']) ? $item['ip'] . PHP_EOL : '';

	echo str_repeat('-', 100) . PHP_EOL . PHP_EOL;
}