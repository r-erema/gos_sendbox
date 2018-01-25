<?php

namespace learning\Patterns\Observer\Example2;

class PatternSubject extends AbstractSubject
{

    /**
     * @var array
     */
    private $favourites = [];

    /**
     * @var AbstractObserver[]
     */
    private $observers = [];

    /**
     * @param AbstractObserver $observerIn
     */
    public function attach(AbstractObserver $observerIn): void
    {
        $this->observers[] = $observerIn;
    }

    /**
     * @param AbstractObserver $observerIn
     */
    public function detach(AbstractObserver $observerIn): void
    {
        foreach($this->observers as $observerKey => $observer) {
            if ($observer === $observerIn) {
                unset($this->observers[$observerKey]);
            }
        }
    }

    /**
     * @return array
     */
    public function notify(): array
    {
        $observersAnswers = [];
        foreach($this->observers as $observer) {
            $observersAnswers[] = $observer->update($this);
        }
        return $observersAnswers;
    }

    /**
     * @param array $newFavorites
     * @return array
     */
    public function updateFavorites(array $newFavorites): array {
        $this->favourites = $newFavorites;
        return $this->notify();
    }

    /**
     * @return array
     */
    public function getFavorites()
    {
        return $this->favourites;
    }

}