<?php

namespace learning\patterns\patterns\object_generation\FactoryMethod\classes\wright;

abstract class CommsManager {

    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getFooterText();

}