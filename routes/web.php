<?php

use App\Controllers\Client\HomeController;
use App\Controllers\Client\ProductController;
use Hion\Base\Route\Route;

$route = new Route();



$route->get('/', HomeController::class, 'index');
$route->get('home', HomeController::class, 'index');
$route->get('product', ProductController::class, 'index');
$route->get('product/(\d+)', ProductController::class, 'find');
