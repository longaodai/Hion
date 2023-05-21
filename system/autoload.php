<?php

/**
 * Handle autoload class
 *
 * @param $class
 * 
 * @return void
 * 
 * @author longvc <vochilong.work@gmail.com>
 */
function autoLoad($class)
{
    $class = str_replace('\\', "/", $class) . '.php';

    if (file_exists($class)) {
        include($class);
    } else {
        throw new Exception('Unable to load class name ' . $class);
    }
}

/**
 * Register autoload
 */
spl_autoload_register("autoLoad");
