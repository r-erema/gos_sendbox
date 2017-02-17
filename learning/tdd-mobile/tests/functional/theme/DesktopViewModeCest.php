<?php
namespace theme;
use \FunctionalTester;

class DesktopViewModeCest
{
    public function _before(FunctionalTester $I)
    {
        $I->resetCookie('mode');
        $I->useDesktopBrowser();
        $I->amOnPage('/');
    }

    public function viewDefaultTheme(FunctionalTester $I)
    {
        $I->dontSeeCookie('mode');
        $I->seeLink('Mobile version');
        $I->dontSeeLink('Desktop version');
    }

    // tests
    public function switchToAlternativeTheme(FunctionalTester $I)
    {
        $I->click('Mobile version');
        $I->seeCookie('mode');
        $I->dontSeeInCurrentUrl('/mobile');
        $I->dontSeeLink('Mobile version');
        $I->seeLink('Desktop version');
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
