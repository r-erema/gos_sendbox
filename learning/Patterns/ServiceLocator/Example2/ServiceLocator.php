<?php

namespace learning\Patterns\ServiceLocator\Example2;

class ServiceLocator implements ServiceLocatorInterface
{

    /**
     * @var array
     */
    private $services = [];

    /**
     * @param $name
     * @param $service
     * @return $this
     */
    public function set(string $name, $service): ServiceLocatorInterface
    {
        if (!is_object($service)) {
            throw new \InvalidArgumentException('Only objects can be registered with the locator');
        }
        if (!in_array($service, $this->services, true)) {
            $this->services[$name] = $service;
        }
        return $this;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get(string $name)
    {
        if (!isset($this->services[$name])) {
            throw new \RuntimeException("The service {$name} has not been registered with the locator.");
        } else {
            return $this->services[$name];
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has(string $name): bool
    {
        return isset($this->services[$name]);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function remove(string $name): ServiceLocatorInterface
    {
        if (isset($this->services[$name])) {
            unset($this->services[$name]);
        }
        return $this;
    }

    public function clear(): ServiceLocatorInterface
    {
        $this->services = [];
        return $this;
    }
}
