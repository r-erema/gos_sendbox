<?php

namespace learning\Zend\ServiceManager\LazyServices;

class Buzzer
{

    public function __construct()
    {
        usleep(500);
    }

    /**
     * @return string
     */
    public function buzz(): string
    {
        return 'Buzz!';
    }

}