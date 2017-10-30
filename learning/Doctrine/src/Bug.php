<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 11.43
 */

namespace learning\Doctrine\src;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Class Bug
 * @package learning\Doctrine\src
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Bug {

    /**
     * @Id @Column(type="integer") @GeneratedValue()
     * @var int
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string")
     */
    protected $description;

    /**
     * @var \DateTime
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * @var string
     * @Column(type="string")
     */
    protected $status;

    /**
     * @var User
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     */
    protected $engineer;

    /**
     * @var User
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     */
    protected $reporter;

    /**
     * @var ArrayCollection
     * @ManyToMany(targetEntity="Product")
     */
    protected $products;

    /**
     * @param Product $product
     */
    public function assignToProduct(Product $product) {
        $this->products[] = $product;
    }

    /**
     * @return ArrayCollection
     */
    public function getProducts() {
        return $this->products;
    }

    public function __construct() {
        $this->products = new ArrayCollection();
    }

    /**
     * @param User $engineer
     */
    public function setEngineer(User $engineer) {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    /**
     * @return User
     */
    public function getEngineer() : User {
        return $this->engineer;
    }

    /**
     * @param User $reporter
     */
    public function setReporter(User $reporter) {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    /**
     * @return User
     */
    public function getReporter(): User {
        return $this->reporter;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @param Product $products
     * @return Bug
     */
    public function setProducts(Product $products) {
        $this->products = $products;
    }

    /**
     * @return string
     */
    public function getStatus(): string {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status) {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated(\DateTime $created) {
        $this->created = $created;
    }

    public function close() {
        $this->status = 'CLOSE';
    }

}