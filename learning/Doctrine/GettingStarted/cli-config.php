<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 27.10.17
 * Time: 11.18
 */
require_once 'bootstrap.php';
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
