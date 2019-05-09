<?php

namespace learning\Patterns\ServiceLocator\Example2;

class Serializer
{
    /**
     * @param string $data
     * @return mixed
     */
    public function serialize(string $data): string
    {
        return serialize($data);
    }

    /**
     * @param string $serilizedData
     * @return string
     */
    public function unserialize(string $serilizedData): string
    {
        return unserialize($serilizedData);
    }
}
