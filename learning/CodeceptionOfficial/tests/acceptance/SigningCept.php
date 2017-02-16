<?php 
$I = new AcceptanceTester($scenario);
$I->am('user');
$I->wantTo('login to website');
$I->lookForwardTo('access all website features');
$I->amOnPage('/login.php');
$I->fillField('login','gutsout');
$I->fillField('password','123');
$I->waitForElement('span', 30);
$I->wait(3);
$I->click('Login');
$I->see('gutsout');
