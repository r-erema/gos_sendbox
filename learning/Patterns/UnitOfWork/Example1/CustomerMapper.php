<?php

namespace learning\Patterns\UnitOfWork\Example1;

/**
 * CustomerMapper это объект ответсвенный за загрузку и сохранение объектов "Клиент".
 * Этот класс реализует паттерн "Data Mapper"
 *
 * Class CustomerMapper
 * @package learning\Patterns\UnitOfWork\Example1
 */
class CustomerMapper
{

    /**
     * @var DataAccessObject
     */
    private $dao;

    /**
     * CustomerMapper constructor.
     * @param DataAccessObject $dao
     */
    public function __construct(DataAccessObject $dao)
    {
        $this->dao = $dao;
    }


    /**
     * @param int $id
     * @return Customer|null
     */
    public function findById(int $id): ?Customer
    {
        $stmt = $this->dao->prepare('SELECT id, email FROM customers WHERE id = ?');
        $stmt->execute([$id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? new Customer($data) : null;
    }

    /**
     * @param Customer $customer
     * @return bool
     */
    public function insert(Customer $customer): bool
    {
        return $this->dao->prepare('INSERT INTO customers (id, email) VALUES (?, ?);')
                         ->execute([$customer->id, $customer->email]);
    }

    /**
     * @param Customer $customer
     * @return int
     */
    public function update(Customer $customer): int
    {
        //dummy //todo: it's necessary to finish
        return 1;
    }

    /**
     * @param Customer $customer
     * @return int
     */
    public function delete(Customer $customer): int
    {
        //dummy //todo: it's necessary to finish
        return 1;
    }

    /**
     * @return DataAccessObject
     */
    public function getDao(): DataAccessObject
    {
        return $this->dao;
    }
}
