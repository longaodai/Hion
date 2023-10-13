<?php

namespace Hion\Base\Database;

class BaseQuery extends Connect
{
    protected $sql = null;
    protected $table = null;
    protected $currentPage = DEFAULT_CURRENT_PAGE;

    /**
     * Query get data exec sql
     *
     * @return mixed
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function get()
    {
        return $this->query(rtrim($this->sql));
    }

    /**
     * Select column in table
     *
     * @param array $params
     *
     * @return BaseQuery
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function select($params = [])
    {
        $column = "*";
        if (count($params) > 0) {
            $column = implode(',', $params);
        }

        $this->sql = $this->sql . "SELECT $column FROM $this->table ";

        return $this;
    }

    /**
     * Pagination
     *
     * @param null $limit
     * @return mixed
     */
    public function pagination($limit = null)
    {
        if (empty($_GET['page']) || $_GET['page'] < DEFAULT_CURRENT_PAGE) {
            $this->currentPage = DEFAULT_CURRENT_PAGE;
        } else {
            $this->currentPage = $_GET['page'];
        }

        if (empty($limit)) {
            $limit = DEFAULT_LIMIT_PAGE;
        }

        $getDataPage = ($this->currentPage - 1) * $limit;
        $this->sql = $this->sql . "LIMIT $getDataPage, $limit";

        return $this;
    }

    /**
     * Where condition column table
     *
     * @param  $column
     * @param  $condition
     * @param  $params
     *
     * @return BaseQuery
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function where($column, $condition, $params)
    {
        $this->sql = $this->sql . "WHERE $column $condition '$params' ";

        return $this;
    }

    /**
     * And where condition column table
     *
     * @param  $column
     * @param  $condition
     * @param  $params
     *
     * @return
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function andWhere($column, $condition, $params)
    {
        $this->sql = $this->sql . "AND WHERE $column $condition $params ";

        return $this;
    }

    /**
     * Show sql string
     * Must use before get()
     *
     * @return
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function toSql()
    {
        echo $this->sql;
        die();
    }

    /**
     * Create data
     *
     * @param array $params
     *
     * @return
     *
     * @author vochilong <vochilong.work@gmail.com>
     */
    public function create($params)
    {
        $column = implode(',', array_keys($params));
        foreach ($params as $key => $param) {
            $params[$key] = "'" . $param . "'";
        }

        $values = implode(',', array_values($params));
        $this->sql = "INSERT INTO $this->table ($column) VALUES ($values)";

        return $this->execute($this->sql);
    }

    public function countRecord()
    {
        $this->sql = "SELECT count(*) FROM $this->table";
    }
}