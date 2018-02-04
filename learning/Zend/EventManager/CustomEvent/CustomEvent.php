<?php

namespace learning\Zend\EventManager\CustomEvent;

use ArrayAccess;
use Zend\EventManager\EventInterface;

class CustomEvent implements EventInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $target;

    /**
     * @var array
     */
    private $params;

    /**
     * @var bool
     */
    protected $stopPropagation = false;

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    public function getParams(): array
    {
        $this->params;
    }

    /**
     * Get a single parameter by name
     *
     * @param  string $name
     * @param  mixed $default Default value to return if parameter does not exist
     * @return mixed
     */
    public function getParam($name, $default = null)
    {
        return $this->params[$name] ?? $default;
    }

    /**
     * @param string $name
     * @return CustomEvent
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param null|object|string $target
     * @return CustomEvent
     */
    public function setTarget($target): self
    {
        $this->target = $target;
        return $this;
    }

    /**
     * @param array|ArrayAccess $params
     * @return CustomEvent
     */
    public function setParams($params): self
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return CustomEvent
     */
    public function setParam($name, $value): self
    {
        $this->params[$name] = $value;
        return $this;
    }

    /**
     * @param bool $flag
     * @return CustomEvent
     */
    public function stopPropagation($flag = true): self
    {
        $this->stopPropagation = (bool) $flag;
        return $this;
    }

    /**
     * @return bool
     */
    public function propagationIsStopped(): bool
    {
        return $this->stopPropagation;
    }
}