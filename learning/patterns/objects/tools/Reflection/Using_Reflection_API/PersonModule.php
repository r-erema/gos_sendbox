<?php

class PersonModule implements Module{
    public function setPerson(Person $person) {
        print "PersonModule::setPerson(): $person->name\n";
    }

    public function execute() {}

}