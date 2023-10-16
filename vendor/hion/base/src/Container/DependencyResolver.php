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

    /**
     * Resolve class dependence injection
     *
     * @param string $className
     *
     * @return mixed|object|string|null
     *
     * @throws \ReflectionException
     *
     * @author <vochilong>
     */
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

    /**
     * Resolve method dependence injection
     *
     * @param $className
     * @param $methodName
     *
     * @return array|void
     *
     * @throws \ReflectionException
     *
     * @author <vochilong>
     */
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
