<?php

namespace learning\Patterns\UnitOfWork\Example1;

abstract class DomainObject {

    /**
     * @var UnitOfWork
     */
    private $unitOfWork;

    /**
     * @return UnitOfWork
     */
    public function getUnitOfWork(): UnitOfWork {
        return $this->unitOfWork;
    }

    /**
     * @param UnitOfWork $unitOfWork
     * @return $this
     */
    public function setUnitOfWork(UnitOfWork $unitOfWork) {
        $this->unitOfWork = $unitOfWork;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasUnitOfWork(): bool {
        return $this->unitOfWork instanceof UnitOfWork;
    }

    public function markAsNew() {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerNew($this);
        }
    }

    public function markAsDeleted() {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerToDelete($this);
        }
    }

    public function markAsDirty() {
        if ($this->hasUnitOfWork()) {
            $this->unitOfWork->registerDirty($this);
        }
    }

}