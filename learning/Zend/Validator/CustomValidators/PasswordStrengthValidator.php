<?php

namespace learning\Zend\Validator\CustomValidators;

use Zend\Validator\AbstractValidator;

class PasswordStrengthValidator extends AbstractValidator
{
    const LENGTH = 'length';
    const UPPER = 'upper';
    const LOWER = 'lower';
    const DIGIT = 'digit';

    const MIN_SYMBOLS_COUNT = 8;

    protected $messageTemplates = array(
        self::LENGTH => "'%value%' must be at least " . self::MIN_SYMBOLS_COUNT . " characters in length",
        self::UPPER  => "'%value%' must contain at least one uppercase letter",
        self::LOWER  => "'%value%' must contain at least one lowercase letter",
        self::DIGIT  => "'%value%' must contain at least one digit character"
    );

    public function isValid($value)
    {
        $this->setValue($value);

        $isValid = true;

        if (mb_strlen($value) < self::MIN_SYMBOLS_COUNT) {
            $this->error(self::LENGTH);
            $isValid = false;
        }

        if (!preg_match('/[A-Z]/', $value)) {
            $this->error(self::UPPER);
            $isValid = false;
        }

        if (!preg_match('/[a-z]/', $value)) {
            $this->error(self::LOWER);
            $isValid = false;
        }

        if (!preg_match('/\d/', $value)) {
            $this->error(self::DIGIT);
            $isValid = false;
        }

        return $isValid;
    }
}
