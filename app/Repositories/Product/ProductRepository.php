<?php

namespace App\Repositories\Product;

use app\Models\ProductModel;
use App\Repositories\BaseRepository;

/**
 * ProductRepository
 */
class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new ProductModel;
    }

    /**
     * Get list
     *
     * @param null $data
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($data = null, $options = null)
    {
        return parent::getList($data, $options);
    }


    /**
     * Get all
     *
     * @param null $data
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getAll($data = null, $options = null)
    {
        return parent::getAll($data, $options);
    }
}