<?php

namespace System\Routes;

class Route
{
    /**
     * Get request
     *
     * @return String
     * 
     * @author longvc <vochilong.work@gmail.com>
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
     * @author longvc <vochilong.work@gmail.com>
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
     * @author longvc <vochilong.work@gmail.com>
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
        $intanceController = new $controller;

        if (count($resultPatern) > 0) {
            call_user_func_array([$intanceController, $method], $resultPatern);
        } else {
            $intanceController->{$method}();
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
     * @author longvc <vochilong.work@gmail.com>
     */
    public function post($url, $controller, $method)
    {
        $this->isMethod('POST');

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
        $intanceController = new $controller;

        if (count($resultPatern) > 0) {
            call_user_func_array([$intanceController, $method], $resultPatern);
        } else {
            $intanceController->{$method}();
        }

        exit();
    }
}
