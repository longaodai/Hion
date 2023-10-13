<?php

namespace Hion\Base\Repository;

class Repository
{
    public $model;

    /**
     * Get all
     *
     * @param null $data
     * @param null $options
     *
     * @return mixed
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function getAll($data = null, $options = null)
    {
        return $this->model->getAll($this->buildParam($data, $options));
    }

    /**
     * Get list
     *
     * @param null $data
     * @param null $options
     *
     * @return mixed
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function getList($data = null, $options = null)
    {
        return $this->model->getList($this->buildParam($data, $options));
    }


    /**
     * Build param data and options
     *
     * @param null $data
     * @param null $options
     *
     * @return array
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function buildParam($data = null, $options = null)
    {
        $params = array();

        $params['data'] = $data;
        $params['options'] = $options;

        return $params;
    }
}