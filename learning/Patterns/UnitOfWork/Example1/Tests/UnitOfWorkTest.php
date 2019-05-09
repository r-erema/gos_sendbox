<?php

namespace learning\Patterns\UnitOfWork\Example1\Tests;

use learning\Patterns\UnitOfWork\Example1\Customer;
use learning\Patterns\UnitOfWork\Example1\CustomerMapper;
use learning\Patterns\UnitOfWork\Example1\DataAccessObject;
use learning\Patterns\UnitOfWork\Example1\MapperRegistry;
use learning\Patterns\UnitOfWork\Example1\UnitOfWork;
use PHPUnit\Framework\TestCase;

class UnitOfWorkTest extends TestCase
{

    /**
     * @var CustomerMapper
     */
    private $customerMapper;

    /**
     * @var UnitOfWork
     */
    private $unitOfWork;

    const INSERTED_CUSTOMER_ID = 11;
    const INSERTED_CUSTOMER_EMAIL = 'test@te.st';

    public function setUp(): void
    {
        $mapperRegistry = new MapperRegistry();
        $mapperRegistry->setDao(new DataAccessObject('sqlite::memory:', null, null, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]));
        $this->customerMapper = $mapperRegistry->getMapperForClassName(Customer::class);
        $mapperRegistry->getDao()
            ->query('
                CREATE TABLE IF NOT EXISTS customers (
                  id PRIMARY KEY,
                  email TEXT NOT NULL
                );
            ');
        $mapperRegistry->getDao()
            ->prepare('INSERT INTO customers (id, email) VALUES (?, ?);')
            ->execute([self::INSERTED_CUSTOMER_ID, self::INSERTED_CUSTOMER_EMAIL]);
        $this->unitOfWork = new UnitOfWork($mapperRegistry);
    }

    /**
     * @test
     */
    public function SelectCustomerTest()
    {
        $customer = $this->customerMapper->findById(self::INSERTED_CUSTOMER_ID);
        $this->assertInstanceOf(Customer::class, $customer);
    }

    /**
     * @test
     */
    public function InsertCustomerTest()
    {
        $id = self::INSERTED_CUSTOMER_ID + 1;
        $customer = new Customer([
            'id' => $id,
            'email' => 'test2@te.st'
        ], $this->unitOfWork);
        $customer->setUnitOfWork($this->unitOfWork);
        $this->unitOfWork->commit();

        $customer = $this->customerMapper->findById($id);
        $this->assertInstanceOf(Customer::class, $customer);
    }
}
