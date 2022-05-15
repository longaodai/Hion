<?php
namespace app\Controllers\Client;

use app\Controllers\Controller;
use app\Models\ProductModel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->model = new ProductModel;
    }

    public function index()
    {
        // Xử lý params
        $request = handleParamGET();
        $params = [
            "search_name" => $request['search_name'] ?? null,
            "search_price" => $request['search_price'] ?? null,
        ];

        $data = $this->model->getAll($params);

        return $this->view('product/index', ["data" => $data]);
    }

    public function add()
    {
        return $this->view('product/store');
    }

    public function store()
    {
        extract($_POST);
        $data = [
            "name" => $name_product,
            "price" => $price_product,
            "description" => "",
        ];
        
        $this->model->store($data);
        
        header('location: /');
    }

    public function find($params)
    {
        dd($this->model->find($params));
    }
}