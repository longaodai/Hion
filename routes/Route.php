<?php

namespace routes;

class Route
{
    public $controller;
    public $method;
    public $params;

    public function __construct($class, $method, $params = [])
    {
        // Handle instance class and use method
        $this->controller = "app\\Controllers\\Client\\" . $class . 'Controller';

        $intanceController = new $this->controller;
        
        if (!method_exists($intanceController, $method)) {
            echo TXT_404_NOT_FOUND;
            die();
        }
        
        if (count($params) > 0) {
            call_user_func_array([$intanceController, $method], $params);
        } else {
            $intanceController->{$method}();
        }
    }
}
