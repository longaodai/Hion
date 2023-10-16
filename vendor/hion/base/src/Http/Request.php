<?php

namespace Hion\Base\Http;

class Request
{
    public $data;
    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    public function __construct()
    {
        $this->data = $_GET;
        $this->handlePostRequest();
    }

    /**
     * Handle post request
     *
     * @return void
     *
     * @author <vochilong>
     */
    private function handlePostRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === self::POST && isset($_SERVER['CONTENT_TYPE'])) {
            $content_type = $_SERVER['CONTENT_TYPE'];

            if (strpos($content_type, 'application/json') !== false) {
                $json_data = file_get_contents("php://input");
                $this->data = array_merge($this->data, json_decode($json_data, true));
            } else {
                $this->data = array_merge($this->data, $_POST);
            }
        }
    }

    public function get($field, $default)
    {
        if (isset($this->data[$field])) {
            return $this->data[$field];
        }

        return $default;
    }

    public function all()
    {
        return $this->data;
    }

    public function onlyValue(...$fields)
    {
        $original = $this->data;

        return array_map(function ($field) use ($original) {
            if (isset($original[$field])) {
                return $original[$field];
            }
        }, ...$fields);
    }
}