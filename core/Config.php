<?php

namespace Core;

class Config
{

    private $settings = [];
    private static $instance;

    public static function getInstance($file)
    {
        if (self::$instance === null) {
            self::$instance = new Config($file);
        }
        return self::$instance;
    }

    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }
}
