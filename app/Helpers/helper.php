<?php

if (!function_exists('dd')) {
    // Function dump & die
    function dd($data)
    {
        var_dump($data);
        die();
    }
}

if (!function_exists('ddArray')) {
    // Function dump & die
    function ddArray($data)
    {
        echo '<pre>',print_r($data, 1),'</pre>';
        die();
    }
}

if (!function_exists('handleParamGET')) {
    // Function handle requets get
    function handleParamGET()
    {
        $currentURL = $_SERVER['REQUEST_URI'];
        $segments = explode('?', $currentURL);
        $result = array();
        // 2 is value required
        if (count($segments) == 2) {
            list($dir, $parmasUrl) = $segments;
            $params = explode('&', $parmasUrl);
            foreach ($params as $param) {
                list($key, $value) = explode('=', $param);
                $result[$key] = str_replace('+', ' ', $value);
            }
        }
        
        return $result;
    }
}
