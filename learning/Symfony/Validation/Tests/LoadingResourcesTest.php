<?php

use PHPUnit\Framework\TestCase;
use \learning\Symfony\Validation\LoadingResources\User;
use \Symfony\Component\Validator\Validation;
use \Symfony\Component\Validator\Mapping\Cache\Psr6Cache;
use \learning\Symfony\Validation\LoadingResources\UserMetadataFactory;

class LoadingResourcesTest extends TestCase
{

    public function testLoadingMethodMapping()
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('Mikhail Saltikov-Schedrin', '123'));
        $this->assertNotEmpty($violations);
    }

    public function testFileLoaders()
    {
        $validator = Validation::createValidatorBuilder()
            ->addYamlMapping(__DIR__ . '/../LoadingResources/validation.yml')
            ->getValidator();

        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('Mikhail Saltikov-Schedrin', '123'));
        $this->assertNotEmpty($violations);
    }

    public function testAnnotations()
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('Mikhail Saltikov-Schedrin', '123'));
        $this->assertNotEmpty($violations);
    }

    public function testMultipleLoaders()
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->addYamlMapping(__DIR__ . '/../LoadingResources/validation.yml')
            ->enableAnnotationMapping()
            ->getValidator();

        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('G.Selinger', '123456'));
        $this->assertNotEmpty($violations);
    }

    public function testCache()
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->setMetadataCache(new Psr6Cache(new Symfony\Component\Cache\Adapter\ArrayAdapter()))
            ->getValidator();

        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('Mikhail Saltikov-Schedrin', '123'));
        $this->assertNotEmpty($violations);
    }

    public function testCustomMetadataFactory()
    {
        $validator = Validation::createValidatorBuilder()
            ->setMetadataFactory(new UserMetadataFactory())
            ->getValidator();
        $violations = $validator->validate(new User('G.Selinger', '123'));
        $this->assertEmpty($violations);

        $violations = $validator->validate(new User('Mikhail Saltikov-Schedrin', '123'));
        $this->assertNotEmpty($violations);
    }
}
