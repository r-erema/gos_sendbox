<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 11.48
 */

namespace learning\Doctrine\GettingStarted\src;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Class User
 * @package learning\Doctrine\GettingStarted\src
 * @Entity(repositoryClass="UserRepository") @Table(name="users")
 */
class User
{

    /**
     * @Id() @GeneratedValue() @Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[] An ArrayCollection of Bug objects
     */
    protected $reportedBugs;

    /**
     * @ORM\OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[] An ArrayCollection of Bug objects
     */
    protected $assignedBugs;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param Bug $bug
     */
    public function addReportedBug(Bug $bug)
    {
        $this->reportedBugs[] = $bug;
    }

    /**
     * @param Bug $bug
     */
    public function assignedToBug(Bug $bug)
    {
        $this->assignedBugs[] = $bug;
    }
}
