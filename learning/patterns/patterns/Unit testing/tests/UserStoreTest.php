<?php

require_once __DIR__ . '/../UserStore.php';
use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase {

    /**
     * @var UserStore
     */
    private $store;

    public function setUp() {
        $this->store = new UserStore();
    }

    public function tearDown() {
    }

    public function testGetUser() {
        $this->store->addUser('bob williams', 'a@b.com', '12345');
        $user = $this->store->getUser('a@b.com');
        $this->assertEquals($user->getMail(), 'a@b.com');
        $this->assertEquals($user->getName(), 'bob williams');
        $this->assertEquals($user->getPass(), '12345');
    }

    public function testAddUser_ShortPass() {
        $this->setExpectedException('Exception');
        $this->store->addUser('bob williams', 'a@b.vom', 'ff');
    }

    public function testAddUser_duplicate() {
        try {
            $ret = $this->store->addUser('bob williams', 'a@b.com', '12345');
            $ret = $this->store->addUser('bob stevens', 'a@b.com', '12345');
            self::fail('Здесь должно быть вызвано исключение');
        } catch (Exception $e) {
            $const = $this->logicalAnd(
                $this->logicalNot($this->contains('bob stevens')),
                $this->isType('array')
            );
            self::AssertThat($this->store->getUser('a@b.com'), $const);
        }
    }

}