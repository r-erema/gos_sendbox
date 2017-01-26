<?php

require __DIR__ . '/vendor/autoload.php';
use \Facebook\WebDriver\Remote\RemoteWebDriver;
use \Facebook\WebDriver\Remote\DesiredCapabilities;
class SeleniumTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var RemoteWebDriver;
	 */
	private $driver;

	protected function setUp() {
		$host = 'http://localhost:4444/wd/hub';
		$this->driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
	}

	public function testAddVenue() {
		$this->driver->get('http://gutsout.web:8080/learning/testing/');
		$button = $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::id('click'));
		$button->click();
		sleep(2);
		$alert = $this->driver->switchTo()->alert();
		$alert->accept();
		$textInput = $this->driver->findElement(\Facebook\WebDriver\WebDriverBy::id('text'));
		$textInput->sendKeys('Selenium the best!');
		$textInput->submit();
	}

	public function setAddVenue() {}


}