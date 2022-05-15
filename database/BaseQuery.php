<?php

namespace database;

class BaseQuery extends Connect
{
    protected $sql = null;
    protected $table = null;

    public function get()
    {
        return $this->query(rtrim($this->sql));
    }

    public function select($params = [])
    {
        $column = "*";
        if (count($params) > 0) {
            $column = implode(',', $params);
        }
        
        $this->sql = $this->sql . "SELECT $column FROM $this->table ";

        return $this;
    }

    public function where($column, $condition, $params)
    {
        $this->sql = $this->sql . "WHERE $column $condition '$params' ";

        return $this;
    }

    public function andWhere($column, $condition, $params)
    {
        $this->sql = $this->sql . "AND WHERE $column $condition $params ";

        return $this;
    }

    public function toSql()
    {
        echo $this->sql;
        die();
    }

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
}