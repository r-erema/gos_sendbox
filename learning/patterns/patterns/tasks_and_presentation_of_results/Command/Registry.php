<?php

namespace Command;

class Registry {
    public static function getAccessManager() {
        return new Manager();
    }
    public static function getMessageSystem() {
        return new MessageSystem();
    }
}