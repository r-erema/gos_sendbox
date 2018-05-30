<?php
/* mongo query

	records = [];
	var cursor = db.getCollection('action-log7').find({
		user: 493579
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));

 */
require_once __DIR__ . '/../../../vendor/autoload.php';

$log = '[
	{
		"_id" : ObjectId("5b050e9366638e026b671892"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "af1b248b-c356-6363-ae27-1340488eb8ed",
		"__time" : ISODate("2018-05-23T06:47:47.018Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050ea866638e18f053323e"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "2d3dabf4-547b-9259-7bee-d2f8a2044fa5",
		"__time" : ISODate("2018-05-23T06:48:08.625Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050efc66638e02c6483b4a"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "25fab751-d64b-f956-37ff-ed303dc7df93",
		"__time" : ISODate("2018-05-23T06:49:32.727Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050efc66638e02c6483b4b"),
		"method" : "Praca\\Api\\Impl\\Employer::updateOrganization",
		"params" : {
			"organization" : "Praca\\BusinessLogic\\Entities\\Employer\\Organization[#77451]"
		},
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "25fab751-d64b-f956-37ff-ed303dc7df93",
		"__time" : ISODate("2018-05-23T06:49:32.837Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b050efd66638e02c6483b4e"),
		"method" : "Praca\\Api\\Impl\\Employer::updateOrganization",
		"params" : {
			"organization" : "Praca\\BusinessLogic\\Entities\\Employer\\Organization[#77451]"
		},
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "25fab751-d64b-f956-37ff-ed303dc7df93",
		"__time" : ISODate("2018-05-23T06:49:33.360Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b050efd66638e1cfc76bd28"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "4e394237-615a-26cb-20fb-b69a36c3f85d",
		"__time" : ISODate("2018-05-23T06:49:33.963Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f2366638e18f05332cb"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "5dcefb3f-f035-4cf6-4cb4-e3bb779c1035",
		"__time" : ISODate("2018-05-23T06:50:11.623Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f2366638e18f05332cc"),
		"method" : "Praca\\Api\\Impl\\User::approveUser",
		"params" : {
			"user" : "Praca\\BusinessLogic\\Entities\\Employer\\Employer[#493579]",
			"secureCode" : "FURG2U"
		},
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "5dcefb3f-f035-4cf6-4cb4-e3bb779c1035",
		"__time" : ISODate("2018-05-23T06:50:11.633Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b050f2366638e02c6483b86"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "6054620b-3144-380c-a57b-32b8c26833f3",
		"__time" : ISODate("2018-05-23T06:50:11.947Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f2466638e2b771dcd66"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "3c4d8930-4c7f-ea95-6f16-c73566eeb237",
		"__time" : ISODate("2018-05-23T06:50:12.217Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f3366638e28a47f5083"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "680efd74-e005-d34f-046a-eb69971ddd59",
		"__time" : ISODate("2018-05-23T06:50:27.039Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f3666638e28a47f5086"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "bcabbc12-4c92-bf72-8591-84103bd3036e",
		"__time" : ISODate("2018-05-23T06:50:30.309Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f3a66638e14235c05ab"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "7c441108-64e1-d09d-5ac1-1cd6366c446a",
		"__time" : ISODate("2018-05-23T06:50:34.045Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f3a66638e3605386ebe"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "c1358b05-b147-5582-b87f-6dab6360462e",
		"__time" : ISODate("2018-05-23T06:50:34.660Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b050f3f66638e35996adbd5"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "df83c566-f097-1e58-2e43-52c7c007df52",
		"__time" : ISODate("2018-05-23T06:50:39.195Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0510c966638e3e46603344"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "9c6b9fec-9582-b7c8-5de1-2c56965d31ef",
		"__time" : ISODate("2018-05-23T06:57:13.538Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0510c966638e3e46603345"),
		"method" : "Praca\\Api\\Impl\\Employer::approveContact",
		"params" : {
			"employer" : "Praca\\BusinessLogic\\Entities\\Employer\\Employer[#493579]",
			"secureCode" : "RZ9WVV"
		},
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "9c6b9fec-9582-b7c8-5de1-2c56965d31ef",
		"__time" : ISODate("2018-05-23T06:57:13.549Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b0510c966638e3e527409bd"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "1f3c751f-3f1f-66f9-4c60-77c23943b7fd",
		"__time" : ISODate("2018-05-23T06:57:13.897Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0510cd66638e36053870ce"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "dfeb342e-e06f-5118-2fcc-3773517b297e",
		"__time" : ISODate("2018-05-23T06:57:17.998Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0510e066638e3e51112b55"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "69481390-c48f-d353-a4af-ae998c6b1c54",
		"__time" : ISODate("2018-05-23T06:57:36.980Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0510e066638e3e51112b56"),
		"method" : "Praca\\Api\\Impl\\Billing::getServicesPriceList",
		"params" : [ ],
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "69481390-c48f-d353-a4af-ae998c6b1c54",
		"__time" : ISODate("2018-05-23T06:57:36.986Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b0510e066638e3e51112b57"),
		"method" : "Praca\\Api\\Impl\\Billing::getActiveServices",
		"params" : [ ],
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "69481390-c48f-d353-a4af-ae998c6b1c54",
		"__time" : ISODate("2018-05-23T06:57:36.990Z"),
		"__namespace" : "logger"
	},
	{
		"_id" : ObjectId("5b0510e466638e3e527409dc"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "bf88b2f3-7aac-af85-f5a7-e06440cf3037",
		"__time" : ISODate("2018-05-23T06:57:40.285Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b051cd566638e7f6f5885fc"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "25cbbdc6-8cbb-4ed5-d006-d30f498dd0db",
		"__time" : ISODate("2018-05-23T07:48:37.046Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b051cd566638e75ee214219"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "27403569-801a-53f9-47a1-1887ec3aebf8",
		"__time" : ISODate("2018-05-23T07:48:37.321Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b051cdd66638e05bc5459e4"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "0741631f-fae0-b6ea-df76-eeefb37ca20a",
		"__time" : ISODate("2018-05-23T07:48:45.807Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0521d166638e5e5d1b79b8"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "87f81e30-c646-2c26-851b-32486f76f164",
		"__time" : ISODate("2018-05-23T08:09:53.048Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0521d166638e4c9c64fd0d"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "2affc3d9-8526-9794-a74a-cf144cfb4102",
		"__time" : ISODate("2018-05-23T08:09:53.463Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0521fe66638e4cad0ac238"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "28211e82-5b7a-9d28-e84a-cc06fb06a171",
		"__time" : ISODate("2018-05-23T08:10:39.002Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0534d966638e0784212034"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "7fc4a67e-f5b4-6f7b-8042-944eead4dcfc",
		"__time" : ISODate("2018-05-23T09:31:05.536Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0534d966638e0d36388e1d"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "307b0f1e-8bb6-8119-e097-adf50dab9f3d",
		"__time" : ISODate("2018-05-23T09:31:05.823Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b05525766638e77874fd970"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "c2f0951a-56af-03b9-24c3-f6482040dae4",
		"__time" : ISODate("2018-05-23T11:36:55.520Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b05525766638e76fe423de9"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "3e69393e-ca07-ce93-b45f-c12a92f2a98d",
		"__time" : ISODate("2018-05-23T11:36:55.815Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b05526766638e76c36d1825"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "9d90bb58-0090-123d-52ef-f058976241f3",
		"__time" : ISODate("2018-05-23T11:37:11.162Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b08286f66638e223f2402a0"),
		"user" : 493579,
		"ip" : "138.197.149.9",
		"request" : "f1221137-a20a-f6d7-0df6-a7998604f679",
		"__time" : ISODate("2018-05-25T15:14:55.584Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b08286f66638e35017d22a5"),
		"user" : 493579,
		"ip" : "138.197.149.9",
		"request" : "407169e3-5cca-2e39-6e69-fa58bd602eb0",
		"__time" : ISODate("2018-05-25T15:14:55.988Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b08287866638e35017d22a8"),
		"user" : 493579,
		"ip" : "138.197.149.9",
		"request" : "187d90f9-2c01-8f00-bb3f-59fe0cf24493",
		"__time" : ISODate("2018-05-25T15:15:04.120Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0bb86b66638e31fa35cd8d"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "186c90a0-3d5b-e0b7-c132-a3cc1e2443cf",
		"__time" : ISODate("2018-05-28T08:06:03.022Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0bb86b66638e42d625a557"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "6e540365-3e94-aefd-6eb2-f57871c1039c",
		"__time" : ISODate("2018-05-28T08:06:03.430Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0bb87066638e37ae6f3c2a"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "32651b15-20eb-02b1-e93d-80238a0423cc",
		"__time" : ISODate("2018-05-28T08:06:08.546Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0c195166638e2f4d0275a4"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "9b0f399d-8a15-aac1-4056-50839d70f49e",
		"__time" : ISODate("2018-05-28T14:59:29.330Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0c195166638e42de6b00cf"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "0c3ab9af-f81b-e769-7fe5-eada3150b43c",
		"__time" : ISODate("2018-05-28T14:59:29.645Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0c195766638e3d50663cd1"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "eeeb0b5e-0837-62fc-1645-d64f60291d5e",
		"__time" : ISODate("2018-05-28T14:59:35.199Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0d641166638e79082e97cf"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "87ee9695-54d9-b63c-4440-963bb5da6092",
		"__time" : ISODate("2018-05-29T14:30:41.708Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0d641266638e0c354429a3"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "f4bddd5d-c3a5-b626-6d43-437dbee98e0a",
		"__time" : ISODate("2018-05-29T14:30:42.031Z"),
		"__namespace" : "authorize"
	},
	{
		"_id" : ObjectId("5b0d641666638e045c7e11d9"),
		"user" : 493579,
		"ip" : "91.219.236.134",
		"request" : "35350c17-4c12-4d49-8f47-67f455698f99",
		"__time" : ISODate("2018-05-29T14:30:46.874Z"),
		"__namespace" : "authorize"
	}
]';


$log = preg_replace('#"_id".*#', '', $log);
$log = preg_replace('#"__time".*?ISODate\("(.*?)T(.*?)\..*?\)#', '"__time" : "$1 $2"', $log);

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
        echo preg_replace('#^.*:#', '', $item['method']) . PHP_EOL;
    }
    echo 'a.korshakov@ro.ru' . PHP_EOL;
    echo $item['ip'] . PHP_EOL;
    echo $item['__time'] . PHP_EOL;
    echo str_repeat('-', 100) . PHP_EOL . PHP_EOL;
}