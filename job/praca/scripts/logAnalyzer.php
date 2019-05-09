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

    // Find vacancy(id: 261065<) actions
    records = [];
    var cursor = db.getCollection('action-log7').find({
        "params.vacancy": "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#261065]"
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
		"_id" : ObjectId("5c3f0f6c66638e3cb94662ae"),
		"method" : "Praca\\Api\\Impl\\Employer::publicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#261065]",
			"type" : "free"
		},
		"user" : 8192,
		"ip" : "37.215.38.78",
		"request" : "949e1039-6756-b06b-f617-178ff6e6b8c1",
		"__time" : ISODate("2019-01-16T11:03:08.591Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5c3f0f6d66638e3cb94662b3"),
		"method" : "Praca\\Api\\Impl\\Employer::changeVacancyAutoUp",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#261065]",
			"enabled" : false
		},
		"user" : 8192,
		"ip" : "37.215.38.78",
		"request" : "949e1039-6756-b06b-f617-178ff6e6b8c1",
		"__time" : ISODate("2019-01-16T11:03:09.072Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5c48490466638e11d231a940"),
		"method" : "Praca\\Api\\Impl\\Employer::unpublicateVacancy",
		"params" : {
			"vacancy" : "Praca\\BusinessLogic\\Entities\\Employer\\Vacancy[#261065]"
		},
		"user" : 8192,
		"ip" : "37.215.46.241",
		"request" : "c9e57b2d-3d53-4eb3-e6df-08d1918f39a5",
		"__time" : ISODate("2019-01-23T10:59:16.911Z"),
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
