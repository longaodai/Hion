<?php

/**
 * Require file autoload
 */
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    require_once __DIR__ . '/system/autoload.php';
}

/**
 * Require file system
 */
if (file_exists(__DIR__ . '/system/system_register.php')) {
    require_once __DIR__ . '/system/system_register.php';
}
