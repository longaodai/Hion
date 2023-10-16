<?php

namespace App\Controllers;

class Request
{
    public function __construct(ControllerBase $controllerBase)
    {

    }

    public function get($page, $data = [])
    {
        return $page;
    }
}
