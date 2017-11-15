<?php

namespace learning\Zend\Validator\Tests;

use learning\Zend\Validator\CustomValidators\FloatValidator;
use learning\Zend\Validator\CustomValidators\NumericBetweenValidator;
use learning\Zend\Validator\CustomValidators\PasswordStrengthValidator;
use PHPUnit\Framework\TestCase;
use Zend\I18n\Validator\Alnum;
use Zend\Validator\EmailAddress;
use Zend\Validator\StringLength;
use Zend\Validator\ValidatorChain;

class EmailValidationTest extends TestCase
{

    public function testEmailValidation()
    {
        $validator = new EmailAddress();
        $this->assertTrue($validator->isValid('#ABC*#@example.com'));
        $this->assertEmpty($validator->getMessages());

        $this->assertFalse($validator->isValid('#ABC *#@example.com'));
        $this->assertNotEmpty($validator->getMessages());
    }

    public function testCustomizeMessages()
    {
        $minSymbols = 15;
        $maxSymbols = 20;
        $validator = new StringLength([
            'min' => $minSymbols,
            'max' => $maxSymbols
        ]);
        $validator->setMessages([
            StringLength::TOO_SHORT => 'The string \'%value%\' is too short; it must be at least %min% characters',
            StringLength::TOO_LONG => 'The string \'%value%\' is too long; it must be not more %max% characters'
        ]);

        $stringToValidate = 'Short sentence';
        $validator->isValid($stringToValidate);
        $this->assertEquals(
            "The string '{$stringToValidate}' is too short; it must be at least {$minSymbols} characters",
            current($validator->getMessages())
        );

        $stringToValidate = 'Very very long sentence';
        $validator->isValid($stringToValidate);
        $this->assertEquals(
            "The string '{$stringToValidate}' is too long; it must be not more {$maxSymbols} characters",
            current($validator->getMessages())
        );

        $stringToValidate = 'It\'s not valid string...';
        $errorMessage = null;
        if (!$validator->isValid($stringToValidate)) {
            $errorMessage = "String failed: {$validator->{'value'}}; it's length is not between {$validator->getMin()} and {$validator->getMax()}";
        }
        $this->assertEquals(
            "String failed: {$stringToValidate}; it's length is not between {$minSymbols} and {$maxSymbols}",
            $errorMessage
        );
    }

    public function testValidatorChain()
    {
        $validatorChain = (new ValidatorChain())
            ->attach(new StringLength([
                'min' => 6,
                'max' => 12]
            ))
            ->attach(new Alnum());
        $validatorChain->isValid('TrueUsername');
        $this->assertTrue($validatorChain->isValid('TrueUsername'));
        $this->assertFalse($validatorChain->isValid('Бαp@k 0бaμ@"'));
    }

    public function testValidatorChainOrderAndBreakOnFailure()
    {
        $validatorChain = (new ValidatorChain())
            ->attach(new StringLength([
                'min' => 6,
                'max' => 7
            ]), true, 1)
            ->attach(new StringLength([
                'min' => 8,
                'max' => 9
            ]), true, 3)
            ->attach(new Alnum(), true, 2);

        $validatorChain->isValid('Str:)');
        $errorMessages = $validatorChain->getMessages();
        $this->assertEquals(1, count($errorMessages));
        $this->assertEquals('The input is less than 8 characters long', current($errorMessages));

        $validatorChain->isValid('_string_');
        $errorMessages = $validatorChain->getMessages();
        $this->assertEquals(1, count($errorMessages));
        $this->assertEquals('The input contains characters which are non alphabetic and no digits', current($errorMessages));
    }

    public function testCustomValidators() {

        $validator = new FloatValidator();
        $this->assertTrue($validator->isValid(3.14));
        $this->assertFalse($validator->isValid(3));

        $validator = new NumericBetweenValidator();
        $this->assertTrue($validator->isValid(6));
        $this->assertFalse($validator->isValid(102));

        $validator = new PasswordStrengthValidator();
        $this->assertFalse($validator->isValid('pass'));
        $this->assertEquals(3, count($validator->getMessages()));

    }
}