<?php
namespace Libs\Config;

class Config
{
    protected static $instance = null;

    protected function __construct (){}
    protected function __clone (){}

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function get($name)
    {

    }

    public function set($name, $value)
    {

    }
}