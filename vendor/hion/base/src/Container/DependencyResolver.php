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
    }

    public function _resolveMethod(string $className, $method)
    {
        $reflection = new ReflectionClass($className);
        $constructor = $reflection->getMethods();

        if (!$constructor) {
            return new $className;
        }

        foreach ($constructor as $constructor1) {
            if ($constructor1->name != $method) {
                continue;
            }

            $parameters = $constructor1->getParameters();
            $dependencies = [];

            foreach ($parameters as $parameter) {
                $dependencyType = $parameter->getType();


                if ($dependencyType) {
                    $dependencies[] = $this->_resolve($dependencyType->getName());
                }


                return $reflection->newInstanceArgs($dependencies);
            }
        }
    }
}
