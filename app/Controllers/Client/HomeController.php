<?php

namespace app\Controllers\Client;

use app\Controllers\Controller;

class HomeController extends Controller
{
    public function index($params = null)
    {
        return $this->view('home');
    }
}