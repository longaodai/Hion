<?php

use routes\Route;
// Get param: domain/index.php?params=
$paramsRequest = isset($_REQUEST['params']) && !empty($_REQUEST['params']) ? $_REQUEST['params'] : '';

/**
 * [class, method, params]
 */
$dataParamsRequest = explode('/', $paramsRequest);

// Check route is admin
$routeRedirectAdmin = false;
if (strtolower(reset($dataParamsRequest)) == FREFIX_ADMIN) {
    $routeRedirectAdmin = true;
}

/**
 * default 
 * [
 *  class   = homeController
 *  method  = index
 * ]
 */
$classDefault = 'Home';
$methodDefault = 'index';

$class = !empty($dataParamsRequest[0]) ? ucfirst($dataParamsRequest[0]) : $classDefault;

// Remove class => get method & params
if (!empty($dataParamsRequest[0])) {
    unset ($dataParamsRequest[0]);
}

$method = !empty($dataParamsRequest[1]) ? $dataParamsRequest[1] : $methodDefault;

// Remove method => get params
if (!empty($dataParamsRequest[1])) {
    unset ($dataParamsRequest[1]);
}

$params = $dataParamsRequest ?? null;

// Handle route
if ($routeRedirectAdmin) {
    dd("route admin");
} else {
    new Route($class, $method, $params);
}