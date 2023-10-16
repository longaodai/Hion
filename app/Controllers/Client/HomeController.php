<?php

namespace App\Controllers\Client;

use App\Controllers\Controller;
use Hion\Base\Http\Request;

class HomeController
{
    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function index(Request $request) //
    {
        dd($request->onlyValue(['test', 'gae']));

        return $this->controller->view('home');
    }

    public function index2() //
    {
        dd($_GET, $_POST);
        return $this->controller->view('home');
    }
}
