<?php

namespace learning\Zend\Validator\CustomValidators;

use Zend\Validator\AbstractValidator;

class FloatValidator extends AbstractValidator
{
    const FLOAT = 'float';

    /**
     * @var array
     */
    protected $messageTemplates = [
        self::FLOAT => "'%value%' is not a floating point value"
    ];

    /**
     * @param mixed $value
     * @return bool
     */
    public function isValid($value)
    {
        $this->setValue($value);
        if (!is_float($value)) {
            $this->error(self::FLOAT);
            return false;
        }
        return true;
    }
}
