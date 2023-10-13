<?php

if (!defined('BASE_URL_CLIENT')) {
    define('BASE_URL_CLIENT', 'http://localhost/baseprojectphp/');
}

if (!defined('PATH_MASTER_LAYOUT')) {
    define('PATH_MASTER_LAYOUT', "./app/Views/layout/master.php");
}

if (!defined('FREFIX_ADMIN')) {
    define('FREFIX_ADMIN', 'admin');
}

if (!defined('TXT_404_NOT_FOUND')) {
    define('TXT_404_NOT_FOUND', '404 Not Found !!!');
}

if (!defined('MENU_CONFIG')) {
    define('MENU_CONFIG', [
        ["name" => "Home", "url" => BASE_URL_CLIENT . 'home'],
        ["name" => "Product", "url" => BASE_URL_CLIENT . 'product'],
    ]);
}

if (!defined('DEFAULT_LIMIT_PAGE')) {
    define('DEFAULT_LIMIT_PAGE', 1);
}

if (!defined('DEFAULT_CURRENT_PAGE')) {
    define('DEFAULT_CURRENT_PAGE', 1);
}