<?php

class Configuration {

    const STORE_INI = 1;
    const STORE_DB = 2;
    const STORE_XML = 3;

    public static function getStore($type = self::STORE_XML) {
        switch ($type) {
            case self::STORE_INI : return new Configuration_Ini();
            case self::STORE_DB : return new Configuration_DB();
            case self::STORE_XML : return new Configuration_XML();
        }
    }

}

class Configuration_Ini {}
class Configuration_DB {}
class Configuration_XML {}

$config = Configuration::getStore(Configuration::STORE_XML);