<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities;

use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\AggregateRoot;
use Doctrine\ORM\Mapping as ORM;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostContentWasChanged;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostTitleWasChanged;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCategorized;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasCreated;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Events\PostWasPublished;

/**
 * @ORM\Entity
 * @ORM\Table(name="categories")
 */
class Category extends AggregateRoot
{

    /**
     * @ORM\Column(type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="Post")
     * @ORM\JoinTable(name="posts_categories",
     *      joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private $posts;
}