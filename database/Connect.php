<?php

namespace database;

use Exception;

class Connect
{
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $databasename = 'php_mvc';
    public static $connect = null;

    public function __construct()
    {
        try {
            if (empty(self::$connect)) {
                self::$connect = new \PDO(
                    "mysql:host=$this->servername;
                    dbname=$this->databasename", 
                    $this->username, $this->password
                );
                self::$connect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }

            return self::$connect;
        } catch (Exception $error) {
            echo "Connection failed: " . $error->getMessage();
        }
    }

    public function query($sql)
    {
        return self::$connect->query($sql)->fetchAll();
    }

    public function execute($sql)
    {
        return self::$connect->exec($sql);
    }
}