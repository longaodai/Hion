<?php

namespace Routes;

use app\Controllers\Client\HomeController;
use app\Controllers\Client\ProductController;
use System\Routes\Route;

$route = new Route();



$route->get('/', HomeController::class, 'index');
$route->get('home', HomeController::class, 'index');
$route->get('product', ProductController::class, 'index');
$route->get('product/(\d+)', ProductController::class, 'find');
