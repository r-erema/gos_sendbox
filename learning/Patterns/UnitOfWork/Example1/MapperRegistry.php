<?php

namespace learning\Patterns\UnitOfWork\Example1;

class MapperRegistry {

    /**
     * @var DataAccessObject
     */
    private $dao;

    /**
     * @var array
     */
    private $mapperContainer = [];

    /**
     * @param string $className
     * @return mixed
     * @throws \Exception
     */
    public function getMapperForClassName(string $className) {

        $mapperClassName = "{$className}Mapper";

        if (isset($this->mapperContainer[$mapperClassName])) {
            return $this->mapperContainer[$mapperClassName];
        }

        if (!class_exists($mapperClassName, true)) {
            throw new \Exception("Unable to locate the class {$mapperClassName}");
        }

        $this->mapperContainer[$mapperClassName] = new $mapperClassName($this->getDao());

        return $this->mapperContainer[$mapperClassName];
    }

    /**
     * @return DataAccessObject
     */
    public function getDao(): DataAccessObject {
        return $this->dao;
    }

    /**
     * @param DataAccessObject $dao
     * @return $this
     */
    public function setDao(DataAccessObject $dao) {
        $this->dao = $dao;
        return $this;
    }

}