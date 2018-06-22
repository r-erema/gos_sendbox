<?php
/* mongo query

	records = [];
	var cursor = db.getCollection('action-log7').find({
		user: 488165
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));



	/////////////////////////
	records = [];
	var cursor = db.getCollection('vacancies-status-toggling').find({
		user_id: 488165
	});

	while(cursor.hasNext()) {
		records.push(cursor.next())
	}
	print(tojson(records));

 */
require_once __DIR__ . '/../../../vendor/autoload.php';

$log = '[
	{
		"_id" : ObjectId("5ad9e90266638e7a5d0bf3dc"),
		"vacancy_id" : 217744,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-20T13:20:02Z")
	},
	{
		"_id" : ObjectId("5add90b266638e781b7210a9"),
		"vacancy_id" : 217744,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-23T07:52:18Z")
	},
	{
		"_id" : ObjectId("5add910766638e136d3c6fa4"),
		"vacancy_id" : 217983,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-23T07:53:43Z")
	},
	{
		"_id" : ObjectId("5adde95466638e33652b6b35"),
		"vacancy_id" : 217983,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-23T14:10:28Z")
	},
	{
		"_id" : ObjectId("5adde9b066638e29f112f36a"),
		"vacancy_id" : 218151,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-23T14:12:00Z")
	},
	{
		"_id" : ObjectId("5adebde066638e7ce7528657"),
		"vacancy_id" : 218151,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T05:17:20Z")
	},
	{
		"_id" : ObjectId("5adebe6b66638e680b3ecf08"),
		"vacancy_id" : 218211,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T05:19:39Z")
	},
	{
		"_id" : ObjectId("5adf03c766638e7bbf690d33"),
		"vacancy_id" : 218211,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T10:15:35Z")
	},
	{
		"_id" : ObjectId("5adf05cc66638e430768ba1f"),
		"vacancy_id" : 218347,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T10:24:12Z")
	},
	{
		"_id" : ObjectId("5adf35cd66638e158b21db47"),
		"vacancy_id" : 218347,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T13:49:01Z")
	},
	{
		"_id" : ObjectId("5adf362866638e222166823c"),
		"vacancy_id" : 218431,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T13:50:32Z")
	},
	{
		"_id" : ObjectId("5adf405666638e31a33e623b"),
		"vacancy_id" : 218431,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T14:33:58Z")
	},
	{
		"_id" : ObjectId("5adf40ce66638e1a7d373bb3"),
		"vacancy_id" : 218446,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T14:35:58Z")
	},
	{
		"_id" : ObjectId("5adf480a66638e1adb08978f"),
		"vacancy_id" : 218446,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T15:06:50Z")
	},
	{
		"_id" : ObjectId("5adf485966638e32690c9f90"),
		"vacancy_id" : 218456,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T15:08:09Z")
	},
	{
		"_id" : ObjectId("5adf49e266638e4b896bb307"),
		"vacancy_id" : 218456,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T15:14:42Z")
	},
	{
		"_id" : ObjectId("5adf4a5666638e4e5b20bcca"),
		"vacancy_id" : 218460,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T15:16:38Z")
	},
	{
		"_id" : ObjectId("5adf6b2e66638e0e9c61c37f"),
		"vacancy_id" : 218460,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-24T17:36:46Z")
	},
	{
		"_id" : ObjectId("5adf6bed66638e0414083a16"),
		"vacancy_id" : 218472,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-24T17:39:57Z")
	},
	{
		"_id" : ObjectId("5ae0018066638e470910036f"),
		"vacancy_id" : 218472,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T04:18:08Z")
	},
	{
		"_id" : ObjectId("5ae001ed66638e4c2b6fbd2a"),
		"vacancy_id" : 218501,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T04:19:57Z")
	},
	{
		"_id" : ObjectId("5ae01b3666638e32607c4b1e"),
		"vacancy_id" : 218501,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T06:07:50Z")
	},
	{
		"_id" : ObjectId("5ae01ba866638e32607c4b9b"),
		"vacancy_id" : 218524,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T06:09:44Z")
	},
	{
		"_id" : ObjectId("5ae02d2666638e0aff7911b3"),
		"vacancy_id" : 218524,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T07:24:22Z")
	},
	{
		"_id" : ObjectId("5ae02d8066638e7c8f5396bd"),
		"vacancy_id" : 218580,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T07:25:52Z")
	},
	{
		"_id" : ObjectId("5ae035ed66638e126711b4dc"),
		"vacancy_id" : 218580,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T08:01:49Z")
	},
	{
		"_id" : ObjectId("5ae0364f66638e1af0713eba"),
		"vacancy_id" : 218600,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T08:03:27Z")
	},
	{
		"_id" : ObjectId("5ae03c1266638e78384e949c"),
		"vacancy_id" : 218600,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T08:28:02Z")
	},
	{
		"_id" : ObjectId("5ae03cd566638e0f124c1f5a"),
		"vacancy_id" : 218615,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T08:31:17Z")
	},
	{
		"_id" : ObjectId("5ae070ea66638e7c9644ec6a"),
		"vacancy_id" : 218615,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T12:13:30Z")
	},
	{
		"_id" : ObjectId("5ae0716666638e0427172586"),
		"vacancy_id" : 218705,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T12:15:34Z")
	},
	{
		"_id" : ObjectId("5ae078a366638e0fac5d7c3d"),
		"vacancy_id" : 218705,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T12:46:27Z")
	},
	{
		"_id" : ObjectId("5ae0798466638e1d807ac022"),
		"vacancy_id" : 218718,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T12:50:12Z")
	},
	{
		"_id" : ObjectId("5ae0950266638e438179546d"),
		"vacancy_id" : 218718,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T14:47:30Z")
	},
	{
		"_id" : ObjectId("5ae0956466638e23711d1fc8"),
		"vacancy_id" : 218760,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T14:49:08Z")
	},
	{
		"_id" : ObjectId("5ae0d93d66638e1eba6a83af"),
		"vacancy_id" : 218760,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-25T19:38:37Z")
	},
	{
		"_id" : ObjectId("5ae0d9be66638e2a160d731b"),
		"vacancy_id" : 218789,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-25T19:40:46Z")
	},
	{
		"_id" : ObjectId("5ae1603b66638e0c525c172f"),
		"vacancy_id" : 218789,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T05:14:35Z")
	},
	{
		"_id" : ObjectId("5ae160bf66638e0cd37533a4"),
		"vacancy_id" : 218799,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T05:16:47Z")
	},
	{
		"_id" : ObjectId("5ae195ad66638e7a5054d963"),
		"vacancy_id" : 218799,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T09:02:37Z")
	},
	{
		"_id" : ObjectId("5ae1967e66638e7a62388087"),
		"vacancy_id" : 218903,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T09:06:06Z")
	},
	{
		"_id" : ObjectId("5ae1983066638e284a3cf149"),
		"vacancy_id" : 218903,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T09:13:20Z")
	},
	{
		"_id" : ObjectId("5ae1988266638e1d464f0e77"),
		"vacancy_id" : 218907,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T09:14:42Z")
	},
	{
		"_id" : ObjectId("5ae1a3f766638e57a2266c98"),
		"vacancy_id" : 218907,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T10:03:35Z")
	},
	{
		"_id" : ObjectId("5ae1a45566638e68617708b0"),
		"vacancy_id" : 218929,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T10:05:09Z")
	},
	{
		"_id" : ObjectId("5ae1b52466638e6c54759337"),
		"vacancy_id" : 218929,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T11:16:52Z")
	},
	{
		"_id" : ObjectId("5ae1b58f66638e6c3e6f6bcc"),
		"vacancy_id" : 218968,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T11:18:39Z")
	},
	{
		"_id" : ObjectId("5ae1bba266638e4ec110ab7e"),
		"vacancy_id" : 218968,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T11:44:34Z")
	},
	{
		"_id" : ObjectId("5ae1bc2166638e688a76f874"),
		"vacancy_id" : 218980,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T11:46:41Z")
	},
	{
		"_id" : ObjectId("5ae1df9866638e3f814bb3b1"),
		"vacancy_id" : 218980,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T14:18:00Z")
	},
	{
		"_id" : ObjectId("5ae1e04e66638e3bbf3cd9d1"),
		"vacancy_id" : 219027,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T14:21:02Z")
	},
	{
		"_id" : ObjectId("5ae1e88666638e3f031f526e"),
		"vacancy_id" : 219027,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-26T14:56:06Z")
	},
	{
		"_id" : ObjectId("5ae1e8dc66638e38ab489245"),
		"vacancy_id" : 219042,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-26T14:57:32Z")
	},
	{
		"_id" : ObjectId("5ae2bb4066638e2de866ed3f"),
		"vacancy_id" : 219042,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-27T05:55:12Z")
	},
	{
		"_id" : ObjectId("5ae2bb9466638e58150ab26a"),
		"vacancy_id" : 219082,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-27T05:56:36Z")
	},
	{
		"_id" : ObjectId("5ae2daa366638e65d5782188"),
		"vacancy_id" : 219082,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-27T08:09:07Z")
	},
	{
		"_id" : ObjectId("5ae2dbcd66638e07f57961eb"),
		"vacancy_id" : 219147,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-27T08:14:05Z")
	},
	{
		"_id" : ObjectId("5ae2e90266638e55506eb512"),
		"vacancy_id" : 219147,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-27T09:10:26Z")
	},
	{
		"_id" : ObjectId("5ae2e96066638e54ed00788c"),
		"vacancy_id" : 219165,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-27T09:12:00Z")
	},
	{
		"_id" : ObjectId("5ae2f9ae66638e4e781d8b52"),
		"vacancy_id" : 219165,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-27T10:21:34Z")
	},
	{
		"_id" : ObjectId("5ae2fa2466638e4b9610c210"),
		"vacancy_id" : 219183,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-27T10:23:32Z")
	},
	{
		"_id" : ObjectId("5ae41f6666638e5f0664750e"),
		"vacancy_id" : 219183,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-28T07:14:46Z")
	},
	{
		"_id" : ObjectId("5ae422fe66638e15c70923e4"),
		"vacancy_id" : 219292,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-28T07:30:06Z")
	},
	{
		"_id" : ObjectId("5ae6de3766638e157033dda9"),
		"vacancy_id" : 219292,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-30T09:13:27Z")
	},
	{
		"_id" : ObjectId("5ae6de9466638e2be660fc88"),
		"vacancy_id" : 219416,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-30T09:15:00Z")
	},
	{
		"_id" : ObjectId("5ae715ba66638e5c9c12fe4d"),
		"vacancy_id" : 219416,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-04-30T13:10:18Z")
	},
	{
		"_id" : ObjectId("5ae7164166638e5c9c12fea4"),
		"vacancy_id" : 219429,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-04-30T13:12:33Z")
	},
	{
		"_id" : ObjectId("5ae95df966638e082276b9f8"),
		"vacancy_id" : 219429,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T06:43:05Z")
	},
	{
		"_id" : ObjectId("5ae95e4466638e0d4778eb25"),
		"vacancy_id" : 219505,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T06:44:20Z")
	},
	{
		"_id" : ObjectId("5ae9665666638e71e30c2edb"),
		"vacancy_id" : 219505,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T07:18:46Z")
	},
	{
		"_id" : ObjectId("5ae966ab66638e114a7287ac"),
		"vacancy_id" : 219541,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T07:20:11Z")
	},
	{
		"_id" : ObjectId("5ae96a1866638e33d57437dd"),
		"vacancy_id" : 219541,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T07:34:48Z")
	},
	{
		"_id" : ObjectId("5ae96a7d66638e49816116c4"),
		"vacancy_id" : 219564,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T07:36:29Z")
	},
	{
		"_id" : ObjectId("5ae9765266638e752c498af3"),
		"vacancy_id" : 219564,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T08:26:58Z")
	},
	{
		"_id" : ObjectId("5ae976b366638e04173e2886"),
		"vacancy_id" : 219607,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T08:28:35Z")
	},
	{
		"_id" : ObjectId("5ae9b10c66638e5d020b8674"),
		"vacancy_id" : 219607,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T12:37:32Z")
	},
	{
		"_id" : ObjectId("5ae9b18766638e5fa8075f91"),
		"vacancy_id" : 219739,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T12:39:35Z")
	},
	{
		"_id" : ObjectId("5ae9b36766638e113f5a0e6f"),
		"vacancy_id" : 219739,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-02T12:47:35Z")
	},
	{
		"_id" : ObjectId("5ae9b3dd66638e2601078dd5"),
		"vacancy_id" : 219743,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-02T12:49:33Z")
	},
	{
		"_id" : ObjectId("5aeaea1066638e72581708c3"),
		"vacancy_id" : 219743,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-03T10:53:04Z")
	},
	{
		"_id" : ObjectId("5aeaea8366638e71ea7c4b56"),
		"vacancy_id" : 219995,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-03T10:54:59Z")
	},
	{
		"_id" : ObjectId("5aeb006966638e7bd82e5ff7"),
		"vacancy_id" : 219995,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-03T12:28:25Z")
	},
	{
		"_id" : ObjectId("5aeb00ee66638e0b3a12ed76"),
		"vacancy_id" : 220033,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-03T12:30:38Z")
	},
	{
		"_id" : ObjectId("5aeb127b66638e27fe57cf58"),
		"vacancy_id" : 220033,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-03T13:45:31Z")
	},
	{
		"_id" : ObjectId("5aeb12cc66638e2803597e03"),
		"vacancy_id" : 220065,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-03T13:46:52Z")
	},
	{
		"_id" : ObjectId("5aebf87466638e763436cd34"),
		"vacancy_id" : 220065,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-04T06:06:44Z")
	},
	{
		"_id" : ObjectId("5aebf8d166638e67a35697fa"),
		"vacancy_id" : 220110,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-04T06:08:17Z")
	},
	{
		"_id" : ObjectId("5aec27ca66638e78ee6300be"),
		"vacancy_id" : 220110,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-04T09:28:42Z")
	},
	{
		"_id" : ObjectId("5aec286a66638e0ad9664f76"),
		"vacancy_id" : 220216,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-04T09:31:22Z")
	},
	{
		"_id" : ObjectId("5aec58ef66638e28be0ec027"),
		"vacancy_id" : 220216,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-04T12:58:23Z")
	},
	{
		"_id" : ObjectId("5aec594966638e3d4e38cb9b"),
		"vacancy_id" : 220284,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-04T12:59:53Z")
	},
	{
		"_id" : ObjectId("5af0507f66638e2cd56fe96e"),
		"vacancy_id" : 220284,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-07T13:11:27Z")
	},
	{
		"_id" : ObjectId("5af0511466638e58843c644d"),
		"vacancy_id" : 220649,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-07T13:13:56Z")
	},
	{
		"_id" : ObjectId("5af142de66638e78985e625f"),
		"vacancy_id" : 220649,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-08T06:25:34Z")
	},
	{
		"_id" : ObjectId("5af1435266638e60ba64cb32"),
		"vacancy_id" : 220732,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-08T06:27:30Z")
	},
	{
		"_id" : ObjectId("5af1671a66638e43917a2e78"),
		"vacancy_id" : 220732,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-08T09:00:10Z")
	},
	{
		"_id" : ObjectId("5af1678966638e62b94c679d"),
		"vacancy_id" : 220831,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-08T09:02:01Z")
	},
	{
		"_id" : ObjectId("5af174c466638e0e1f6932f1"),
		"vacancy_id" : 220831,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-08T09:58:28Z")
	},
	{
		"_id" : ObjectId("5af1754066638e0e280a6771"),
		"vacancy_id" : 220860,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-08T10:00:32Z")
	},
	{
		"_id" : ObjectId("5af1921466638e73833ba6d1"),
		"vacancy_id" : 220860,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-08T12:03:32Z")
	},
	{
		"_id" : ObjectId("5af1926466638e467669cadd"),
		"vacancy_id" : 220910,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-08T12:04:52Z")
	},
	{
		"_id" : ObjectId("5af197af66638e5b284f605b"),
		"vacancy_id" : 220910,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-08T12:27:27Z")
	},
	{
		"_id" : ObjectId("5af1986866638e6c4333e7d6"),
		"vacancy_id" : 220923,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-08T12:30:32Z")
	},
	{
		"_id" : ObjectId("5af3ddf966638e440c67de17"),
		"vacancy_id" : 220923,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-10T05:51:53Z")
	},
	{
		"_id" : ObjectId("5af3de4a66638e6a387ae612"),
		"vacancy_id" : 221035,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-10T05:53:14Z")
	},
	{
		"_id" : ObjectId("5af4266a66638e1c602e7d42"),
		"vacancy_id" : 221035,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-10T11:00:58Z")
	},
	{
		"_id" : ObjectId("5af426bc66638e1c3a0c4a5a"),
		"vacancy_id" : 221170,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-10T11:02:20Z")
	},
	{
		"_id" : ObjectId("5af4450366638e49fa6ade48"),
		"vacancy_id" : 221170,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-10T13:11:31Z")
	},
	{
		"_id" : ObjectId("5af4467266638e5861601cd9"),
		"vacancy_id" : 221216,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-10T13:17:38Z")
	},
	{
		"_id" : ObjectId("5af5349666638e6d63551b13"),
		"vacancy_id" : 221216,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-11T06:13:42Z")
	},
	{
		"_id" : ObjectId("5af5352c66638e7d116c27b4"),
		"vacancy_id" : 221298,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-11T06:16:12Z")
	},
	{
		"_id" : ObjectId("5afa8a6b66638e47fc461ef1"),
		"vacancy_id" : 221298,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-15T07:21:15Z")
	},
	{
		"_id" : ObjectId("5afa8bf466638e5c864a7b8d"),
		"vacancy_id" : 221949,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-15T07:27:48Z")
	},
	{
		"_id" : ObjectId("5afa94d366638e76c157cb6a"),
		"vacancy_id" : 221949,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-15T08:05:39Z")
	},
	{
		"_id" : ObjectId("5afa984766638e3b6b1e9ce2"),
		"vacancy_id" : 221983,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-15T08:20:23Z")
	},
	{
		"_id" : ObjectId("5afa9a2b66638e569549a462"),
		"vacancy_id" : 221983,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-15T08:28:27Z")
	},
	{
		"_id" : ObjectId("5afa9ac866638e78f91cbf32"),
		"vacancy_id" : 221993,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-15T08:31:04Z")
	},
	{
		"_id" : ObjectId("5afad9fe66638e37ba67c63c"),
		"vacancy_id" : 221993,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-15T13:00:46Z")
	},
	{
		"_id" : ObjectId("5afada4e66638e3eea694743"),
		"vacancy_id" : 222092,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-15T13:02:06Z")
	},
	{
		"_id" : ObjectId("5afc43b966638e1b1651f7f3"),
		"vacancy_id" : 222092,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-16T14:44:09Z")
	},
	{
		"_id" : ObjectId("5afc441b66638e1efe311838"),
		"vacancy_id" : 222378,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-16T14:45:47Z")
	},
	{
		"_id" : ObjectId("5afd6dd566638e451e64dfdb"),
		"vacancy_id" : 222378,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-17T11:56:05Z")
	},
	{
		"_id" : ObjectId("5afd6e5d66638e5ac311555d"),
		"vacancy_id" : 222598,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-17T11:58:21Z")
	},
	{
		"_id" : ObjectId("5afe890166638e26e86efca6"),
		"vacancy_id" : 222598,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-18T08:04:17Z")
	},
	{
		"_id" : ObjectId("5afe894c66638e388c5fb576"),
		"vacancy_id" : 222733,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-18T08:05:32Z")
	},
	{
		"_id" : ObjectId("5b02aa3e66638e166122edc5"),
		"vacancy_id" : 222733,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-21T11:15:10Z")
	},
	{
		"_id" : ObjectId("5b02aacf66638e1f9856e492"),
		"vacancy_id" : 223120,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-21T11:17:35Z")
	},
	{
		"_id" : ObjectId("5b03d60e66638e669e209451"),
		"vacancy_id" : 223120,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-22T08:34:22Z")
	},
	{
		"_id" : ObjectId("5b03d6bd66638e03b713ffd8"),
		"vacancy_id" : 223333,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-22T08:37:17Z")
	},
	{
		"_id" : ObjectId("5b041e7f66638e52720716d1"),
		"vacancy_id" : 223333,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-22T13:43:27Z")
	},
	{
		"_id" : ObjectId("5b041f0966638e618c427e97"),
		"vacancy_id" : 223470,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-22T13:45:45Z")
	},
	{
		"_id" : ObjectId("5b0509a166638e1ee81ca308"),
		"vacancy_id" : 223470,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-23T06:26:41Z")
	},
	{
		"_id" : ObjectId("5b0509fb66638e288133ca3f"),
		"vacancy_id" : 223553,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-23T06:28:11Z")
	},
	{
		"_id" : ObjectId("5b0513d566638e7a5b146b89"),
		"vacancy_id" : 223553,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-23T07:10:13Z")
	},
	{
		"_id" : ObjectId("5b05143666638e7a4376c4cd"),
		"vacancy_id" : 223564,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-23T07:11:50Z")
	},
	{
		"_id" : ObjectId("5b05417d66638e62be1e55c6"),
		"vacancy_id" : 223564,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-23T10:25:01Z")
	},
	{
		"_id" : ObjectId("5b05427366638e62a25da396"),
		"vacancy_id" : 223651,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-23T10:29:07Z")
	},
	{
		"_id" : ObjectId("5b056bcb66638e4c8d2aa1d0"),
		"vacancy_id" : 223651,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-23T13:25:31Z")
	},
	{
		"_id" : ObjectId("5b056c4866638e42ca63821f"),
		"vacancy_id" : 223712,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-23T13:27:36Z")
	},
	{
		"_id" : ObjectId("5b05707e66638e017e084396"),
		"vacancy_id" : 223712,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-23T13:45:34Z")
	},
	{
		"_id" : ObjectId("5b0570e466638e083a40475f"),
		"vacancy_id" : 223720,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-23T13:47:16Z")
	},
	{
		"_id" : ObjectId("5b06545266638e60b451f53c"),
		"vacancy_id" : 223720,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-24T05:57:38Z")
	},
	{
		"_id" : ObjectId("5b06554d66638e243f57c179"),
		"vacancy_id" : 223795,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-24T06:01:49Z")
	},
	{
		"_id" : ObjectId("5b06629266638e065c10f2d7"),
		"vacancy_id" : 223795,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-24T06:58:26Z")
	},
	{
		"_id" : ObjectId("5b06648c66638e2e835e5563"),
		"vacancy_id" : 223821,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-24T07:06:52Z")
	},
	{
		"_id" : ObjectId("5b06c7c966638e6bfe20bc48"),
		"vacancy_id" : 223821,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-24T14:10:17Z")
	},
	{
		"_id" : ObjectId("5b06c88f66638e714c2e76e4"),
		"vacancy_id" : 223987,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-24T14:13:35Z")
	},
	{
		"_id" : ObjectId("5b07b7bd66638e10f978c746"),
		"vacancy_id" : 223987,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-25T07:14:05Z")
	},
	{
		"_id" : ObjectId("5b07b82766638e133101fa8e"),
		"vacancy_id" : 224068,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-25T07:15:51Z")
	},
	{
		"_id" : ObjectId("5b07c1d366638e22353d70d4"),
		"vacancy_id" : 224068,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-25T07:57:07Z")
	},
	{
		"_id" : ObjectId("5b07c34966638e1cb4371a8b"),
		"vacancy_id" : 224090,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-25T08:03:21Z")
	},
	{
		"_id" : ObjectId("5b07e30366638e6e630b4251"),
		"vacancy_id" : 224090,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-25T10:18:43Z")
	},
	{
		"_id" : ObjectId("5b07e35b66638e126d038837"),
		"vacancy_id" : 224137,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-25T10:20:11Z")
	},
	{
		"_id" : ObjectId("5b07eb9b66638e17a75741ea"),
		"vacancy_id" : 224137,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-25T10:55:23Z")
	},
	{
		"_id" : ObjectId("5b07ed5566638e131b4beba2"),
		"vacancy_id" : 224162,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-25T11:02:45Z")
	},
	{
		"_id" : ObjectId("5b0bcbb066638e7bc426a8bb"),
		"vacancy_id" : 224162,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-28T09:28:16Z")
	},
	{
		"_id" : ObjectId("5b0bcc2a66638e6d3321cabb"),
		"vacancy_id" : 224475,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-28T09:30:18Z")
	},
	{
		"_id" : ObjectId("5b0d018066638e43a73c6ff9"),
		"vacancy_id" : 224475,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-29T07:30:08Z")
	},
	{
		"_id" : ObjectId("5b0d01df66638e4abc085a2f"),
		"vacancy_id" : 224700,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-29T07:31:43Z")
	},
	{
		"_id" : ObjectId("5b0d276566638e16b01071a0"),
		"vacancy_id" : 224700,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-29T10:11:49Z")
	},
	{
		"_id" : ObjectId("5b0d27b366638e24824fc556"),
		"vacancy_id" : 224782,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-29T10:13:07Z")
	},
	{
		"_id" : ObjectId("5b0d4f4166638e551163a099"),
		"vacancy_id" : 224782,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-29T13:01:53Z")
	},
	{
		"_id" : ObjectId("5b0d4f9966638e55303a9245"),
		"vacancy_id" : 224849,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-29T13:03:21Z")
	},
	{
		"_id" : ObjectId("5b0d567166638e4d27630f1e"),
		"vacancy_id" : 224849,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-29T13:32:33Z")
	},
	{
		"_id" : ObjectId("5b0d56c466638e4d1b6d600d"),
		"vacancy_id" : 224855,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-29T13:33:56Z")
	},
	{
		"_id" : ObjectId("5b0e3d9d66638e15e91b13c0"),
		"vacancy_id" : 224855,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-30T05:58:53Z")
	},
	{
		"_id" : ObjectId("5b0e3df466638e274d152ab6"),
		"vacancy_id" : 224942,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-30T06:00:20Z")
	},
	{
		"_id" : ObjectId("5b0e5fe466638e31587dd30f"),
		"vacancy_id" : 224942,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-30T08:25:08Z")
	},
	{
		"_id" : ObjectId("5b0e603a66638e1b761d67c2"),
		"vacancy_id" : 225011,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-30T08:26:34Z")
	},
	{
		"_id" : ObjectId("5b0e626c66638e4f63406b7e"),
		"vacancy_id" : 225011,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-30T08:35:56Z")
	},
	{
		"_id" : ObjectId("5b0e636366638e4f6529988e"),
		"vacancy_id" : 225018,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-30T08:40:03Z")
	},
	{
		"_id" : ObjectId("5b0e65ed66638e10ee7bef13"),
		"vacancy_id" : 225018,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-30T08:50:53Z")
	},
	{
		"_id" : ObjectId("5b0e6a5566638e4a55511c3e"),
		"vacancy_id" : 225031,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-30T09:09:41Z")
	},
	{
		"_id" : ObjectId("5b0e884a66638e540a4895d1"),
		"vacancy_id" : 225031,
		"user_id" : 488165,
		"action" : "unublishing",
		"time" : ISODate("2018-05-30T11:17:30Z")
	},
	{
		"_id" : ObjectId("5b0e88bf66638e61283c3ed9"),
		"vacancy_id" : 225083,
		"user_id" : 488165,
		"action" : "publishing",
		"time" : ISODate("2018-05-30T11:19:27Z")
	}
]';


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
        echo preg_replace('#^.*:#', '', $item['method']) . PHP_EOL;
    }
	//echo 'assolatolena2017@gmail.com.log' . PHP_EOL;
    echo isset($item['user_id']) && $item['user_id'] == 488165 ? "Пользователь: assolatolena2017@gmail.com" . PHP_EOL : 'XXX';
    echo isset($item['action']) ? "Действие: {$item['action']}" . PHP_EOL : '';
    echo isset($item['vacancy_id']) ? "Id вакансии: {$item['vacancy_id']}" . PHP_EOL : '';
    //echo isset($item['time']) ? $item['time'] . PHP_EOL : '';
	echo isset($item['__time']) ? $item['__time'] . PHP_EOL : '';
	echo isset($item['ip']) ? $item['ip'] . PHP_EOL : '';

    echo str_repeat('-', 100) . PHP_EOL . PHP_EOL;
}