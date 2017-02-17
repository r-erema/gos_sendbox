<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class FunctionalTester extends \Codeception\Actor
{
    use _generated\FunctionalTesterActions;

    public function useDesktopBrowser()
    {
        $this->haveHttpHeader('USER_AGENT', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.59 Safari/537.36');
    }

    public function useTabletBrowser()
    {
        $this->haveHttpHeader('USER_AGENT', 'Mozilla/5.0 (Linux; Android 4.0; Galaxy Nexus AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0 Mobile Safari/535.19');
    }

}
