<?php

namespace learning\FiniteStateMachine\Finite;

use Finite\Exception\ObjectException;
use Finite\Loader\ArrayLoader;
use Finite\StatefulInterface;
use Finite\StateMachine\StateMachine;

include __DIR__ . '/vendor/autoload.php';

class MyDocument implements StatefulInterface
{

    private $state;

    public function getFiniteState()
    {
        return $this->state;
    }

    public function setFiniteState($state)
    {
        $this->state = $state;
    }

}

$document = new MyDocument();
$stateMachine = new StateMachine();
$loader = new ArrayLoader([
    'class' => MyDocument::class,
    'states' => [
        'draft' => ['type' => 'initial', 'properties' => []],
        'proposed' => ['type' => 'normal', 'properties' => []],
        'accepted' => ['type' => 'final', 'properties' => []],
        'refused' => ['type' => 'final', 'properties' => []],
    ],
    'transitions' => [
        'propose' => ['from' => ['draft'], 'to' => 'proposed'],
        'accept' => ['from' => ['proposed'], 'to' => 'accepted'],
        'refuse' => ['from' => ['proposed'], 'to' => 'refused'],
    ]
]);

$loader->load($stateMachine);
$stateMachine->setObject($document);
try {
    $stateMachine->initialize();
} catch (ObjectException $e) {
}

$state = $stateMachine->getCurrentState();
var_dump($stateMachine->getCurrentState()->getName());
var_dump($stateMachine->can('accept'));
var_dump($stateMachine->can('propose'));
$stateMachine->apply('propose');
var_dump($stateMachine->getCurrentState()->getName());
