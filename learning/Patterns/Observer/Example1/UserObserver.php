<?php

namespace learning\Patterns\Observer\Example1;

use SplSubject;

class UserObserver implements \SplObserver
{

    /**
     * @var array
     */
    private $changedUsers = [];

    /**
     * @param SplSubject $subject
     */
    public function update(SplSubject $subject)
    {
        $this->changedUsers[] = clone $subject;
    }

    /**
     * @return array
     */
    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }

}