<?php

class DaimondPlains extends Plains{
    public function getWealthFactor() {
        return parent::getWealthFactor() + 2;
    }
}