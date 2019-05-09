<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 1/14/18
 * Time: 5:44 PM
 */

namespace learning\Zend\ServiceManager\Delegators;

use Interop\Container\ContainerInterface;
use Zend\EventManager\Event;
use Zend\EventManager\EventManager;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class BuzzerDelegatorFactory implements DelegatorFactoryInterface
{

    /**
     * @param ContainerInterface $container
     * @param string $name
     * @param callable $callback
     * @param array|null $options
     * @return BuzzerDelegator|object
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $realBuzzer = call_user_func($callback); /** @var Buzzer $realBuzzer */
        $eventManager = $container->get(EventManager::class); /** @var EventManager $eventManager */
        $eventManager->attach('buzz', function (Event $event) {
            $buzzerDelegator = $event->getTarget();/** @var BuzzerDelegator $buzzerDelegator */
            $buzzerDelegator->setResult('Stare at the art!' . PHP_EOL);
        });
        return new BuzzerDelegator($realBuzzer, $eventManager);
    }
}
