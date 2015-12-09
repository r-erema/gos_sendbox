<?php

namespace Multiton;

/**
 * Class RegistryFactory
 * @package Multiton
 */
class RegistryFactory extends FactoryAbstract {

    /**
     * RegistryFactory constructor.
     */
    protected function __construct($id) {}

    /**
     * @param $id
     * @return mixed
     */
    final public static function getInstance($id) {
        $className = self::getClassName();
        if(isset(self::$instances[$className])) {
            if (!(isset(self::$instances[$className][$id]) && self::$instances[$className][$id] instanceof $className)) {
                self::$instances[$className][$id] = new $className($id);
            }
        } else {
            self::$instances[$className] = [
                $id => new $className($id)
            ];
        }
        return self::$instances[$className][$id];
    }
    final public static function removeInstance($id = null) {
        $className = self::getClassName();
        if (isset(self::$instances[$className])) {
            if (is_null($id)) {
                unset(self::$instances[$className]);
            } else {
                if (isset(self::$instances[$className][$id])) {
                    unset(self::$instances[$className][$id]);
                }
                if (empty(self::$instances[$className])) {
                    unset(self::$instances[$className]);
                }
            }
        }
    }



}