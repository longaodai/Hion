<?php

namespace app\Controllers;

class Controller 
{
    public $page;
    public $data;
    public $model = null;

    public function view($page, $data = [])
    {
        $this->page = $page;
        $this->data = $data;
        
        return include_once PATH_MASTER_LAYOUT;
    }
}