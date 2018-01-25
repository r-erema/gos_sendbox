<?php

namespace learning\Patterns\Observer\Example2;

class PatternObserver extends AbstractObserver
{

    /**
     * @param AbstractSubject $subjectIn
     * @return array|null
     */
    function update(AbstractSubject $subjectIn): ?array
    {
        if ($subjectIn instanceof PatternSubject) { /** @var PatternSubject $subjectIn */
            return array_merge($subjectIn->getFavorites(), ['data mapper']);
        }
        return null;
    }
}