<?php
namespace theme;
use \FunctionalTester;

class MobileViewModeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->resetCookie('mode');
        $I->useTabletBrowser();
        $I->amOnPage('/');
    }

    public function viewDefaultTheme(FunctionalTester $I)
    {
        $I->dontSeeCookie('mode');
        $I->seeLink('Desktop version');
        $I->dontSeeLink('Mobile version');
    }

    // tests
    public function switchToAlternativeTheme(FunctionalTester $I)
    {
        $I->click('Mobile version');
        $I->seeCookie('mode');
        $I->dontSeeInCurrentUrl('/mobile');
        $I->dontSeeLink('Desktop version');
        $I->seeLink('Mobile version');
    }

    public function switchBack(FunctionalTester $I)
    {
        $I->click('Mobile version');
        $I->seeLink('Desktop version');
        $I->click('Desktop version');
        $I->seeCookie('mode');
        $I->dontSeeInCurrentUrl('desktop');
        $I->seeLink('Mobile version');
        $I->dontSeeLink('Desktop version');
    }
}
