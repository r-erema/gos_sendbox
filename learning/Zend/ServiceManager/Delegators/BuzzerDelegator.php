<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 1/14/18
 * Time: 5:13 PM
 */

namespace learning\Zend\ServiceManager\Delegators;

use Zend\EventManager\EventManagerInterface;

class BuzzerDelegator extends Buzzer
{

    /**
     * @var Buzzer
     */
    protected $realBuzzer;

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @var string
     */
    private $result;

    /**
     * BuzzerDelegator constructor.
     * @param Buzzer $realBuzzer
     * @param EventManagerInterface $eventManager
     */
    public function __construct(Buzzer $realBuzzer, EventManagerInterface $eventManager)
    {
        $this->realBuzzer = $realBuzzer;
        $this->eventManager = $eventManager;
    }

    /**
     * @return string
     */
    public function buzz(): string
    {
        $this->eventManager->trigger('buzz', $this);
        return "{$this->result} {$this->realBuzzer->buzz()}";
    }

    /**
     * @param string $result
     * @return BuzzerDelegator
     */
    public function setResult(string $result): BuzzerDelegator
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @return string
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

}