<?php

function autoLoad($class)
{
    $class = str_replace('\\', "/", $class).'.php';
    
    if (file_exists($class)) {
        include($class);
    } else {
        throw new Exception('Unable to load class name ' . $class);
    }
}

spl_autoload_register("autoLoad");