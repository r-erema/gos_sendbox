<?php

namespace learning\Symfony\Validation\Metadata;

use Symfony\Component\Validator\Constraints\IsTrue;
use \Symfony\Component\Validator\Mapping\ClassMetadata;
use \Symfony\Component\Validator\Constraints\Length;
use \Symfony\Component\Validator\Constraints\NotBlank;

class Author
{

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $password;

    /**
     * Author constructor.
     * @param string $firstName
     * @param string $password
     */
    public function __construct($firstName, $password)
    {
        $this->firstName = $firstName;
        $this->password = $password;
    }

    /**
     * @return bool
     */
    public function isPasswordSafe()
    {
        return $this->firstName !== $this->password;
    }

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('firstName', new NotBlank());
        $metadata->addPropertyConstraint('firstName', new Length(['min' => 3]));
        $metadata->addGetterConstraint('passwordSafe', new IsTrue([
            'message' => 'The password cannot match your first name'
        ]));
    }
}