<?php

namespace learning\Patterns\UnitOfWork\Example1;

/**
 * Class Customer
 * @package learning\Patterns\UnitOfWork\Example1
 */
class Customer extends DomainObject
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $email;

    /**
     * Customer constructor.
     * @param array|null $values
     * @param UnitOfWork|null $unitOfWork
     */
    public function __construct(array $values = null, UnitOfWork $unitOfWork = null)
    {
        if ($unitOfWork instanceof UnitOfWork) {
            $this->setUnitOfWork($unitOfWork);
        }
        if (is_array($values)) {
            foreach ($values as $field => $value) {
                if (property_exists($this, $field)) {
                    $this->{$field} = $value;
                }
            }
        }
        $this->markAsNew();
    }
}
