<?php

namespace Hion\Base\Database;

use Exception;

class Connect
{
    private $server_name = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database_name = 'php_mvc';
    public static $connect = null;

    public function __construct()
    {
        try {
            if (empty(self::$connect)) {
                self::$connect = new \PDO(
                    "mysql:host=$this->server_name;
                    dbname=$this->database_name",
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