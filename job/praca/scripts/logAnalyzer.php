<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

const KEY_MAP = [

];

const USER_ID_EMAIL_MAP = [

];

$log = '[
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "8ccb6e15-f1a9-8560-9f55-873b219cc816",
		"time" : "2018-04-10T07:35:55.218Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "4b9af39d-e0a7-e1fa-b417-3dbaf02963e0",
		"time" : "2018-04-10T07:36:03.871Z",
		"namespace" : "authorize"
	},
	{
		
		"method" : "Praca\Api\Impl\User::approveUser",
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "4b9af39d-e0a7-e1fa-b417-3dbaf02963e0",
		"time" : "2018-04-10T07:36:03.881Z",
		"namespace" : "logger"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "2f932799-67ef-071a-e84c-590d40ecdf1a",
		"time" : "2018-04-10T07:36:04.317Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "83bedb2f-b6ce-33e3-f3ef-185fa75f10cc",
		"time" : "2018-04-10T07:36:04.554Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "b16ecbc7-b58d-b52e-b66c-5e61be9bc015",
		"time" : "2018-04-10T07:36:50.843Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "71625b3d-c28f-4316-70d5-9e388feeb2cd",
		"time" : "2018-04-10T07:37:14.920Z",
		"namespace" : "authorize"
	},
	{
		
		"method" : "Praca\Api\Impl\Employer::updateOrganization",
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "71625b3d-c28f-4316-70d5-9e388feeb2cd",
		"time" : "2018-04-10T07:37:15.035Z",
		"namespace" : "logger"
	},
	{
		
		"method" : "Praca\Api\Impl\Employer::updateOrganization",
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "71625b3d-c28f-4316-70d5-9e388feeb2cd",
		"time" : "2018-04-10T07:37:15.530Z",
		"namespace" : "logger"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "d1c57c06-a555-cff2-146f-972d4adbc342",
		"time" : "2018-04-10T07:37:16.061Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "b325fa48-d898-a0dc-19aa-434eecb755f7",
		"time" : "2018-04-10T07:37:34.773Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "46bfd433-8cc8-87be-cb40-ed05e93fdd34",
		"time" : "2018-04-10T07:37:41.033Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "a42a29dc-00e1-07e4-d091-d98255f8af29",
		"time" : "2018-04-10T07:37:42.066Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "1570af4c-6b92-6049-72b2-699c702690d0",
		"time" : "2018-04-10T07:37:52.726Z",
		"namespace" : "authorize"
	},
	{
		
		"method" : "Praca\Api\Impl\Employer::approveContact",
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "1570af4c-6b92-6049-72b2-699c702690d0",
		"time" : "2018-04-10T07:37:52.736Z",
		"namespace" : "logger"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "15ba9a31-c344-4d39-2488-01c8ca0ab62e",
		"time" : "2018-04-10T07:37:53.271Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "354bc5a1-25c4-30a9-0c64-3c9fcde63acb",
		"time" : "2018-04-10T07:38:10.881Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "fe430144-c7cb-da0e-7890-725563bb5185",
		"time" : "2018-04-10T10:32:19.606Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "d3ea7513-e23e-05d7-7c11-0b7079a63cc4",
		"time" : "2018-04-11T15:45:02.652Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "f901be4a-b9c1-f26c-f596-9f91ed414675",
		"time" : "2018-04-11T15:45:14.136Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "dbdaac8f-7ef3-f0b9-67e2-cfab2804ca3a",
		"time" : "2018-04-12T06:50:37.268Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "d5e3bdcb-b4cf-5770-8042-35a54607f9e5",
		"time" : "2018-04-13T18:24:10.757Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "d4cb944e-053f-2b57-4294-2355d877690a",
		"time" : "2018-04-13T18:24:11.040Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "5558a207-d67f-953b-86a5-84a4d09db1e0",
		"time" : "2018-04-13T18:24:39.733Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "84536a28-bd0e-86f8-1c2b-1588bc6ffd5e",
		"time" : "2018-04-16T06:30:27.660Z",
		"namespace" : "authorize"
	},
	{
		
		"user" : 486363,
		"ip" : "91.219.236.134",
		"request" : "5a16f811-ea0f-d18d-bd0d-38cbf9f424fb",
		"time" : "2018-04-16T06:30:28.016Z",
		"namespace" : "authorize"
	}
]';

$log = str_replace([
    'Praca\Api\Impl\User::approveUser',
    'Praca\Api\Impl\Employer::approveContact',
    'Praca\Api\Impl\Employer::updateOrganization'
], [
    'Подтверждение юзера',
    'Подтверждение контакта',
    'Редактирование организации',
], $log);

$decodedLog = json_decode($log, true);

foreach ($decodedLog as $i => $item) {
    if (isset($item['namespace']) && $item['namespace'] === 'authorize') {
        echo 'Вход на сайт/переход на страницу/обновление страницы' . PHP_EOL;
    } elseif (isset($item['method'])) {
        echo $item['method'] . PHP_EOL;
    }
    echo 'vladjar6861@mail.ru' . PHP_EOL;
    echo $item['ip'] . PHP_EOL;
    echo $item['time'] . PHP_EOL;
    echo str_repeat('-', 100) . PHP_EOL . PHP_EOL;
}