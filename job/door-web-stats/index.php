<?php

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use src\DataGrabber;
use src\Strategies\RemoteGrabStrategy;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DomCrawler\Crawler;

require_once __DIR__ . '/vendor/autoload.php';

class GrabStrategy implements RemoteGrabStrategy {

	/**
	 * @var string
	 */
	private $login;

	/**
	 * @var string
	 */
	private $password;

	/**
	 * @var string
	 */
	private $remoteUrl;

	/**
	 * @var Crawler
	 */
	private $crawler;

	public function __construct(string $login, string $password, string $remoteUrl, Crawler $crawler)
	{
		$this->login = $login;
		$this->password = $password;
		$this->remoteUrl = $remoteUrl;
		$this->crawler = $crawler;
	}

	/**
	 * @param ClientInterface $httpClient
	 * @return array
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function grabDataRemotely(ClientInterface $httpClient): array
	{
		$response = $httpClient->request('POST', $this->remoteUrl, ['form_params' => [
			'auth[login]' => $this->login,
			'auth[pass]' => $this->password
		]]);
		$html = (string) $response->getBody();
		$this->crawler->addContent($html);
		$text = $this->crawler->filterXPath('//*[contains(., "Отработано")]')->first()->text();
		preg_match('#Отработано.*? ([\d]*?):([\d]*?):([\d]*)#u', $text, $matches);

		array_shift($matches);
		return $matches;
	}
}

class GetStats extends Command {

	public const ARGUMENT_MONTH = 'month';
	public const ARGUMENT_YEAR = 'year';
	public const ARGUMENT_COUNT_WORKING_DAYS_IN_MONTH = 'working-days';

	protected function configure(): void
	{
		$this->setName('app:get-stats')
			 ->addArgument(self::ARGUMENT_COUNT_WORKING_DAYS_IN_MONTH, InputArgument::REQUIRED, 'Count of working days')
			 ->addArgument(self::ARGUMENT_MONTH, InputArgument::OPTIONAL, 'Stats of month', date('m'))
			 ->addArgument(self::ARGUMENT_YEAR, InputArgument::OPTIONAL, 'Stats of month', date('Y'))
			 ->setDescription('Getting statistics');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{

		$config = require __DIR__ . '/config.php';

		$month = $input->getArgument(self::ARGUMENT_MONTH);
		$year = $input->getArgument(self::ARGUMENT_YEAR);
		$firstDayOfMonth = new \DateTime("01.{$month}.{$year}");
		$lastDayOfMonth = (clone $firstDayOfMonth)->modify('last day of this month');

		$query = http_build_query(['filter' => [
			'from' => $firstDayOfMonth->format('d.m.Y'),
			'to' => $lastDayOfMonth->format('d.m.Y')
		]]);

		$grabber =  new DataGrabber(new GrabStrategy(
			$config[CONFIG_KEY_LOGIN],
			$config[CONFIG_KEY_PASSWORD],
			"{$config[CONFIG_KEY_URL]}?{$query}",
			new Crawler()
		));

		$workingDaysInMonth = $input->getArgument(self::ARGUMENT_COUNT_WORKING_DAYS_IN_MONTH);
		$needToWorkInThisMonthHours = $workingDaysInMonth * $config[CONFIG_KEY_WORKING_HOURS_PER_DAY];
		$needToWorkInThisMonthSeconds = $needToWorkInThisMonthHours * 60 * 60;
		$lunchHours = $workingDaysInMonth * $config[CONFIG_KEY_HOURS_PER_LUNCH];// lunch time in hours = 1;

		$workedTime = $grabber->grabRemotely(new Client($config[CONFIG_KEY_GUZZLE_HTTP_CLIENT_CONFIG]));

		[$workedHours, $workedMinutes, $workedSeconds] = $workedTime;
		$workedHours -= $lunchHours;
		$workedSeconds = $workedHours * 60 * 60 + $workedMinutes * 60 + $workedSeconds;

		$remainingSecondsToWork = $needToWorkInThisMonthSeconds - $workedSeconds;
		$remainingMinutesToWork = round($remainingSecondsToWork  / 60);
		$remainingSecondsToWork %= 60;

		$remainingHoursToWork = round($remainingMinutesToWork / 60);
		$remainingMinutesToWork %= 60;

		$output->write("Нужно отработать: {$remainingHoursToWork}:{$remainingMinutesToWork}:{$remainingSecondsToWork}", true);


	}

}

$app = new Application();
$app->add(new GetStats());
try {
	$app->run();
} catch (Exception $e) {
	echo $e->getMessage();
	exit(1);
}

