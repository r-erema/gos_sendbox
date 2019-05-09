<?php

declare(strict_types=1);

namespace learning\Patterns\TemplateMethod\Example1;

abstract class Journey
{
    private $thingsTodo = [];

    final public function takeATrip(): void
    {
        $this->thingsTodo[] = $this->buyAFlight();
        $this->thingsTodo[] = $this->takePlane();
        $this->thingsTodo[] = $this->enjoyVacation();
        $buyGift = $this->buyGift();

        if ($buyGift !== null) {
            $this->thingsTodo[] = $buyGift;
        }

        $this->thingsTodo[] = $this->takePlane();
    }

    abstract protected function enjoyVacation(): string;

    protected function buyGift(): ?string
    {
        return null;
    }

    protected function buyAFlight(): string
    {
        return 'Buy a flight ticket';
    }

    protected function takePlane(): string
    {
        return 'Taking the plane';
    }

    public function getThingsToDo(): array
    {
        return $this->thingsTodo;
    }
}
