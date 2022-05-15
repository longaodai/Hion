<?php

namespace app\Models;

use database\BaseQuery;

class ProductModel extends BaseQuery
{
    public $table = "product";

    public function getAll($params)
    {
        $this->select(["name", "price"]);

        if (isset($params['search_name']) && !empty($params['search_name'])) {
            $this->where('name', 'LIKE', "%".$params['search_name'] . "%");
        }

        if (isset($params['search_price']) && !empty($params['search_price'])) {
            $this->where('price', '=', $params['search_price']);
        }

        return $this->get();
    }

    public function store($params)
    {
        return $this->create($params);
    }
}