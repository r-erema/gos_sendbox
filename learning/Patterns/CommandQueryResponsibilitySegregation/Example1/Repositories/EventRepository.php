<?php

declare(strict_types=1);

namespace learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Repositories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\Post;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Entities\PostId;
use learning\Patterns\CommandQueryResponsibilitySegregation\Example1\Projector\Projector;
use ReflectionException;

class EventRepository extends EntityRepository
{}