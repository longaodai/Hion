<?php

namespace App\Controllers\Client;

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index($params = null)
    {
        return $this->view('home');
    }
}