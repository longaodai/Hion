<?php

namespace Hion\Base\Container;

use ReflectionClass;

class DependencyResolver
{
    protected $dependencies = [];

    public function register($name, $className)
    {
        $this->dependencies[$name] = $className;
    }

    public function _resolve(string $className)
    {
        $reflection = new ReflectionClass($className);
        $constructor = $reflection->getConstructor();

        if (!$constructor) {
            return new $className;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependencyType = $parameter->getType();


            if ($dependencyType) {
                $dependencies[] = $this->_resolve($dependencyType->getName());
            }

            return $reflection->newInstanceArgs($dependencies);
        }

        return new $className;
    }

    public function _resolveMethod($className, $methodName)
    {
        $reflectionClass = new ReflectionClass($className);

        if ($reflectionClass->hasMethod($methodName)) {
            $reflectionMethod = $reflectionClass->getMethod($methodName);
            $parameters = $reflectionMethod->getParameters();
            $dependencies = [];

            foreach ($parameters as $parameter) {
                $parameterName = $parameter->getName();
                $parameterType = $parameter->getType();

                if ($parameterType) {
                    $di = $parameterType->getName();
                    $dependencies[] = $this->_resolve($di);
                }
            }

            return $dependencies;
        }
    }
}
