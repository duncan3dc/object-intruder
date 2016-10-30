<?php

namespace duncan3dc\ObjectIntruder;

class Intruder
{
    /**
     * @var object $instance The object to intrude.
     */
    private $_intruderInstance;

    /**
     * @var \ReflectionClass $reflection The reflected instance.
     */
    private $_intruderReflection;


    /**
     * Create a new instance.
     *
     * @param object $instance The object to intrude.
     */
    public function __construct($instance)
    {
        if (!is_object($instance)) {
            throw new \InvalidArgumentException("Only objects can be intruded");
        }

        $this->_intruderInstance = $instance;
    }


    private function getInstance()
    {
        return $this->_intruderInstance;
    }


    private function getReflection()
    {
        if ($this->_intruderReflection === null) {
            $this->_intruderReflection = new \ReflectionClass($this->_intruderInstance);
        }

        return $this->_intruderReflection;
    }


    public function __get($name)
    {
        $property = $this->getReflection()->getProperty($name);
        $property->setAccessible(true);
        return $property->getValue($this->getInstance());
    }


    public function __set($name, $value)
    {
        $property = $this->getReflection()->getProperty($name);
        $property->setAccessible(true);
        return $property->setValue($this->getInstance(), $value);
    }


    public function __call($name, array $arguments)
    {
        $method = $this->getReflection()->getMethod($name);
        $method->setAccessible(true);

        return $method->invokeArgs($this->getInstance(), $arguments);
    }
}
