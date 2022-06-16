<?php

namespace App\Models;

use database\BaseQuery;

class BaseModel extends BaseQuery
{
    /**
     * Get data from params
     *
     * @param array $params
     * @param string $key
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getData($params, $key)
    {
        return $params['data'][$key] ?? null;
    }

    /**
     * Get options from params
     *
     * @param array $params
     * @param string $key
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getOption($params, $key)
    {
        return $params['options'][$key] ?? null;
    }

    /**
     * Get all
     *
     * @param array $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getAll($params)
    {
        return $this->get();
    }

    /**
     * Get list pagination
     *
     * @param array $params
     * 
     * @return mixed
     * 
     * @author longvc <vochilong.work@gmail.com>
     */
    public function getList($params)
    {
        $data['paginate'] = [
            'current_page' => $this->currentPage,
            'number_of_page' => ceil(count($this->get()) / $this->currentPage),
        ];
        $data['data'] = $this->pagination()->get();

        return $data;
    }
}