<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 29.10.17
 * Time: 14.32
 */

namespace learning\Patterns\UnitOfWork\Example1;

class UnitOfWork
{

    /**
     * @var MapperRegistry
     */
    private $mapperRegistry;

    /**
     * @var array
     */
    private $dirtyObjects = [];

    /**
     * @var array
     */
    private $newObjects = [];

    /**
     * @var array
     */
    private $objectsToDelete = [];

    /**
     * UnitOfWork constructor.
     * @param MapperRegistry $mapperRegistry
     */
    public function __construct(MapperRegistry $mapperRegistry)
    {
        $this->mapperRegistry = $mapperRegistry;
    }

    /**
     * @param DomainObject $object
     */
    public function registerDirty(DomainObject $object)
    {
        $this->dirtyObjects[spl_object_hash($object)] = $object;
    }

    /**
     * @param DomainObject $object
     */
    public function registerToDelete(DomainObject $object)
    {
        $this->objectsToDelete[spl_object_hash($object)] = $object;
    }

    /**
     * @param DomainObject $object
     * @throws \Exception
     */
    public function registerNew(DomainObject $object)
    {
        if ($this->isDirty($object)) {
            throw new \Exception('Cannot register as new, object is marked for deletion');
        } elseif ($this->isDirty($object)) {
            throw new \Exception('Cannot register as new, object is marked as dirty');
        } elseif ($this->isNew($object)) {
            throw new \Exception('Cannot register as new, object is marked as dirty');
        } else {
            $this->newObjects[spl_object_hash($object)] = $object;
        }
    }

    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isNew(DomainObject $object): bool
    {
        return isset($this->newObjects[spl_object_hash($object)]);
    }

    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDirty(DomainObject $object): bool
    {
        return isset($this->dirtyObjects[spl_object_hash($object)]);
    }

    /**
     * @param DomainObject $object
     * @return bool
     */
    public function isDeleted(DomainObject $object): bool
    {
        return isset($this->objectsToDelete[spl_object_hash($object)]);
    }

    public function commit()
    {

        /** @var CustomerMapper $mapper */
        foreach ($this->newObjects as $newObject) {
            $mapper = $this->mapperRegistry->getMapperForClassName(get_class($newObject));
            $mapper->insert($newObject);
        }

        foreach ($this->dirtyObjects as $updateObject) {
            $mapper = $this->mapperRegistry->getMapperForClassName(get_class($updateObject));
            $mapper->update($updateObject);
        }

        foreach ($this->objectsToDelete as $objectToDelete) {
            $mapper = $this->mapperRegistry->getMapperForClassName(get_class($objectToDelete));
            $mapper->delete($objectToDelete);
        }
    }
}
