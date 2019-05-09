<?php

namespace learning\Patterns\Observer\Example1;

use SplSubject;

class UserObserver implements \SplObserver
{
    private $changedUsers = [];

    public function update(SplSubject $subject): void
    {
        $this->changedUsers[] = clone $subject;
    }

    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }
}
