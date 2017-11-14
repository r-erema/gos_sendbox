<?php

namespace learning\Symfony\Validation\LoadingResources;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class User
{

    /**
     * @Symfony\Component\Validator\Constraints\NotBlank()
     * @Symfony\Component\Validator\Constraints\Length(min=5,max=10)
     * @var string
     */
    protected $name;

    /**
     * @Symfony\Component\Validator\Constraints\Length(min=3)
     * @var string
     */
    protected $password;

    /**
     * User constructor.
     * @param string $name
     * @param string $password
     */
    public function __construct(string $name, string $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
        $metadata->addPropertyConstraint('name', new Length([
            'min' => 5,
            'max' => 10
        ]));

        $metadata->addPropertyConstraint('password', new Length(['max' => 5]));
    }

}