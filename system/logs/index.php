<?php

/**
 * Set display log error
 */
ini_set('display_errors', env('APP_DEBUG'));

/**
 * Set write log error
 */
ini_set('log_errors', env('APP_DEBUG'));
ini_set('error_log', __DIR__ . '/../../storage/logs/' . date('Y-m-d') . '_error.log');
