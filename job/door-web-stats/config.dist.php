<?php

const CONFIG_KEY_URL = 'url';
const CONFIG_KEY_LOGIN = 'login';
const CONFIG_KEY_PASSWORD = 'password';
const CONFIG_KEY_GUZZLE_HTTP_CLIENT_CONFIG = 'guzzle-http-client-config';
const CONFIG_KEY_WORKING_HOURS_PER_DAY = 'working-hours-per-day';
const CONFIG_KEY_HOURS_PER_LUNCH = 'hours-per-lunch';

return [
	CONFIG_KEY_URL => 'https://door.web/',
	CONFIG_KEY_LOGIN => 'login',
	CONFIG_KEY_PASSWORD => 'pass',
	CONFIG_KEY_GUZZLE_HTTP_CLIENT_CONFIG => ['verify' => false],
	CONFIG_KEY_WORKING_HOURS_PER_DAY => 8,
	CONFIG_KEY_HOURS_PER_LUNCH => 1,
];