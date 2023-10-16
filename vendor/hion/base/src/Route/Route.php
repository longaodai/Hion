<?php

namespace Hion\Base\Route;

use Hion\Base\Container\DependencyResolver;

class Route
{
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';
    private $_is_route_not_found = true;

    /**
     * Get request
     *
     * @return String
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    private function getRequest()
    {
        $urlRequest = !empty($_REQUEST['params']) ? $_REQUEST['params'] : '/';

        return parse_url($urlRequest, PHP_URL_PATH);
    }

    /**
     * Check is method
     *
     * @param String $requestMethod
     *
     * return void
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    private function isMethod($requestMethod)
    {
        return $_SERVER['REQUEST_METHOD'] == $requestMethod;
    }


    /**
     * Route get
     *
     * @param $url
     * @param $controller
     * @param $method
     *
     * @return void
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function get($url, $controller, $method)
    {
        if (!$this->isMethod(self::GET)) {
            return;
        };

        /**
         * Prepare pattern match
         */
        $pattern = '~^' . $url . '$~i';
        $resultPattern = false;
        $urlRequest = $this->getRequest();

        /**
         * Check pattern and get params match
         */
        if (preg_match($pattern, $urlRequest, $matches)) {
            $resultPattern = $matches;
        }

        if (!$resultPattern) {
            return $this;
        }

        $this->_is_route_not_found = false;
        unset($resultPattern[0]);
        $resolver = new DependencyResolver();
        $intanceController = $resolver->_resolve($controller);

        if (count($resultPattern) > 0) {
            $intanceController->{$method}($resultPattern, ...$resolver->_resolveMethod($controller, $method));
        } else {
            $intanceController->{$method}(...$resolver->_resolveMethod($controller, $method));
        }

        exit();
    }

    /**
     * Route post
     *
     * @param $url
     * @param $controller
     * @param $method
     *
     * @return void
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function post($url, $controller, $method)
    {
        if (!$this->isMethod(self::POST)) {
            return;
        };
        
        /**
         * Prepare pattern match
         */
        $pattern = '~^' . $url . '$~i';
        $resultPattern = false;
        $urlRequest = $this->getRequest();

        /**
         * Check pattern and get params match
         */
        if (preg_match($pattern, $urlRequest, $matches)) {
            $resultPattern = $matches;
        }

        if (!$resultPattern) {
            return $this;
        }

        $this->_is_route_not_found = false;
        unset($resultPattern[0]);
        $resolver = new DependencyResolver();
        $intanceController = $resolver->_resolve($controller);

        if (count($resultPattern) > 0) {
            $intanceController->{$method}($resultPattern, ...$resolver->_resolveMethod($controller, $method));
        } else {
            $intanceController->{$method}(...$resolver->_resolveMethod($controller, $method));
        }

        exit();
    }

    public function __destruct()
    {
        if ($this->_is_route_not_found) {
            exit('404 Not Found');
        }
    }
}
