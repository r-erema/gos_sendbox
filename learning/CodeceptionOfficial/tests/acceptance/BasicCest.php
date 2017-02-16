<?php


class BasicCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function checkLogin(AcceptanceTester $I)
    {
        $I->wantTo('log in to site');
        $I->amOnPage('/login.php');
        $I->fillField('login', 'Roma');
        $I->fillField('password', '123');
        $I->click('Login');
        $I->see('Roma');
        $I->seeInCurrentUrl('hp');
    }
}
