<?php

if (!function_exists('dd')) {
    /**
     * Dump and die
     *
     * @param  $data
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function dd(...$data)
    {
        echo "<pre>";
        var_dump(...$data);
        die();
    }
}

if (!function_exists('ddArray')) {
    /**
     * Dump array 
     *
     * @param  $data
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function ddArray($data)
    {
        echo '<pre>',print_r($data, 1),'</pre>';
        die();
    }
}

if (!function_exists('handleParamGET')) {
    /**
     * Handle param get request
     *
     * @return array
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
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

if (!function_exists('renderPagination')) {
    /**
     * Render pagination
     *
     * @param array $paginationData
     * 
     * @return void
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function renderPagination($paginationData)
    {
        ddArray($paginationData);
    }
}

if (!function_exists('getURLCurrentPage')) {
    /**
     * Get url current page
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function getURLCurrentPage()
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://"; 
        } else {
            $url = "http://";
        }  

        $url.= $_SERVER['HTTP_HOST'];  

        return $url .= $_SERVER['REDIRECT_URL'];
    }
}

if (!function_exists('getFullURLCurrentPage')) {
    /**
     * Get full url current page
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    function getFullURLCurrentPage()
    {
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $url = "https://"; 
        } else {
            $url = "http://";
        }  

        $url.= $_SERVER['HTTP_HOST'];   
        
        return $url.= $_SERVER['REQUEST_URI'];    
    }
}