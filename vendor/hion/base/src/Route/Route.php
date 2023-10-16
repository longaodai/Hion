<?php

namespace Hion\Base\Route;

use Hion\Base\Container\DependencyResolver;

class Route
{
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
        if ($_SERVER['REQUEST_METHOD'] !== $requestMethod) {
            if (env('APP_ENV') == 'production') {
                exit('500 !!!');
            }

            exit('Method not allowed !!!');
        }
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
        $this->isMethod('GET');

        /**
         * Prepare pattern match
         */
        $pattern = '~^' . $url . '$~i';
        $resultPatern = false;
        $urlRequest = $this->getRequest();

        /**
         * Check pattern and get params match
         */
        if (preg_match($pattern, $urlRequest, $matches)) {
            $resultPatern = $matches;
        }

        if (!$resultPatern) {
            return $this;
        }

        unset($resultPatern[0]);
        $di = new DependencyResolver();
        // var_dump($di->_resolve($controller));
        // // var_dump($controller);
        // die();

        $intanceController = $di->_resolve($controller);

        if (count($resultPatern) > 0) {
            $intanceController->{$method}($resultPatern, ...$di->_resolveMethod($controller, $method));
        } else {
            $intanceController->{$method}(...$di->_resolveMethod($controller, $method));
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
        $this->isMethod('POST');

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

        unset($resultPattern[0]);
        $instanceController = new $controller;

        if (count($resultPattern) > 0) {
            call_user_func_array([$instanceController, $method], $resultPattern);
        } else {
            $instanceController->{$method}();
        }

        exit();
    }
}
