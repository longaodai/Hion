<?php

namespace App\Models;

class ProductModel extends BaseModel
{
    public $table = "product";

    /**
     * Get all
     *
     * @param array|null $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getAll($params)
    {
        $this->select(["name", "price"]);

        if (!empty($this->getData($params, 'search_name'))) {
            $this->where('name', 'LIKE', "%". $this->getData($params, 'search_name') . "%");
        }

        if (!empty($this->getData($params, 'search_price'))) {
            $this->where('price', '=', $this->getData($params, 'search_price'));
        }

        return parent::getAll($params);
    }

    /**
     * Store
     *
     * @param array|null $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function store($params)
    {
        return $this->create($params);
    }

    /**
     * Get list
     *
     * @param array|null $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($params)
    {
        $this->select(["name", "price"]);
        
        return parent::getList($params);
    }
}