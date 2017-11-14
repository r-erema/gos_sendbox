<?php

use PHPUnit\Framework\TestCase;
use \learning\Symfony\Validation\Metadata\Author;
use \Symfony\Component\Validator\Validation;

class MetaDataTest extends TestCase
{

    public function testDataOk()
    {
        $author = new Author('J.Lon', '123');
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();
        $violations = $validator->validate($author);
        $this->assertEmpty($violations);
    }

    public function testPasswordUnsafe()
    {
        $author = new Author('J.Lon', 'J.Lon');
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();
        $violations = $validator->validate($author);
        $this->assertNotEmpty($violations);
    }

    public function testTooShort()
    {
        $author = new Author('J.', '123');
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();
        $violations = $validator->validate($author);
        $this->assertNotEmpty($violations);
    }


}
