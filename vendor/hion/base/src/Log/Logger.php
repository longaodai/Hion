<?php

namespace Hion\Base\Log;

class Logger
{
    public function __construct($path)
    {
        ini_set('display_errors', true);
        ini_set('log_errors', true);
        ini_set('error_log', $path . '/storage/logs/' . date('Y-m-d') . '_error.log');
    }
}