<?php

namespace src\Mocks;

class Synoptic {

    protected function showWord($word) {echo $word;}
    public function getTemperature() {return random_int(0, 50);}
    public function getWord($temperature) {
        $temperature = (int) $temperature;
        if ($temperature < 15) { return 'cold'; }
        if ($temperature > 25) { return 'hot'; }
        return 'warm';
    }
    public function process() {
        $temperature = $this->getTemperature();
        $word = $this->getWord($temperature);
        $this->showWord($word);
    }

}