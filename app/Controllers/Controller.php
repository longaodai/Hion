<?php

namespace app\Controllers;

class Controller 
{
    public $page;
    public $data;
    public $repository = null;

    /**
     * Include master view
     *
     * @param string $page
     * @param array $data
     * 
     * @return 
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function view($page, $data = [])
    {
        $this->page = $page;
        $this->data = $data;
        
        return include_once PATH_MASTER_LAYOUT;
    }
}