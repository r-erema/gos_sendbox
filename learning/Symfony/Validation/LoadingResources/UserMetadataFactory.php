<?php

namespace learning\Symfony\Validation\LoadingResources;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Mapping\Factory\MetadataFactoryInterface;

class UserMetadataFactory implements MetadataFactoryInterface
{
    public function getMetadataFor($value)
    {
        $metaData = new ClassMetadata(get_class($value));
        $metaData->addPropertyConstraint('name', new Length([
            'min' => 3,
            'max' => 10
        ]));
        return $metaData;
    }

    public function hasMetadataFor($value)
    {
        return true;
    }
}