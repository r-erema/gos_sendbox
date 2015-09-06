<?php

class PersonWriter {

    public function writeName(Person $person) {
        print $person->getName() . "\n";
    }

    public function writeAge(Person $person) {
        print $person->getAge() . "\n";
    }

}