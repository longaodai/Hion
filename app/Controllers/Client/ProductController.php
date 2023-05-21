<?php

namespace app\Controllers\Client;

use app\Controllers\Controller;
use App\Repositories\Product\ProductRepository;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->repository = new ProductRepository;
    }

    /**
     * Get list data
     *
     * @return midex
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function index(...$args)
    {
        // Xử lý params
        $request = handleParamGET();
        $params = [
            "search_name" => $request['search_name'] ?? null,
            "search_price" => $request['search_price'] ?? null,
        ];

        $result = $this->repository->getList($params);
        $data = $result['data'];
        $paginate = $result['paginate'];
        // dd($paginate);

        // return $this->view('product/index', ["data" => $result]);
        return $this->view('product/index', ["data" => $data, 'paginate' => $paginate]);
    }

    /**
     * Add form data
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function add()
    {
        return $this->view('product/store');
    }

    /**
     * Store data
     *
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function store()
    {
        extract($_POST);
        $data = [
            "name" => $name_product,
            "price" => $price_product,
            "description" => "",
        ];

        $this->repository->store($data);

        header('location: /');
    }

    /**
     * Find data
     *
     * @param  $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function find($params)
    {
        dd('This is method find');
    }
}
