<?php
use PHPUnit\Framework\TestCase;

class SymfonyValidationTest extends TestCase
{
    public function testStringLength()
    {
        $validator = \Symfony\Component\Validator\Validation::createValidator();
        $violations = $validator->validate('Test string', [
            new \Symfony\Component\Validator\Constraints\Length(['min' => 10]),
            new \Symfony\Component\Validator\Constraints\NotBlank()
        ]);
        $this->assertEmpty($violations);
    }
}
