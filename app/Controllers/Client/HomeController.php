<?php

namespace App\Controllers\Client;

use App\Controllers\Controller;
use App\Controllers\Request;

class HomeController
{
    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function index(Request $request) //
    {
        return $this->controller->view('home');
    }

    public function index2() //
    {
        return $this->controller->view('home');
    }
}
