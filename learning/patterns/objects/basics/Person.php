<?php

/**
 * Class Person
 *  @property $name
 *  @property $age
 */
class Person {

    private $id;
    private $writer;

    public function __construct(PersonWriter $writer) {
        $this->writer = $writer;
    }

    public function __destruct() {
        if(!empty($this->id)) {
            //saving...
            echo 'saved!';
        }
    }

    public function __clone() {
        $this->id = 0;
    }

    public function __call($methodName, $arguments) {
        if(method_exists($this->writer, $methodName)) {
            return $this->writer->$methodName($this);
        }
        return null;
    }

    public function __get($property) {
        $method = "get{$property}";
        if(method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    public function __set($property, $value) {
        $method = "set{$property}";
        if(method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    public function __unset($property) {
        $method = "set{$property}";
        if(method_exists($this, $method)) {
            $this->$method(null);
        }
    }

    function __isset($property) {
        $method = "get{$property}";
        return method_exists($this, $method);
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name;
        if(!is_null($name)) {
            $this->name = $name;
        }
    }

    public function setAge($age) {
        $this->age;
        if(!is_null($age)) {
            $this->age = $age;
        }
    }

    public function getName() {
        return 'Ivan';
    }

    public function getAge() {
        return 44;
    }

    public function __toString() {
        $desc = $this->getName();
        $desc .= " (age: {$this->getAge()} years old)";
        return $desc;
    }


}