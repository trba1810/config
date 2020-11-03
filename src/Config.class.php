<?php
namespace Practice2020\Config;

interface Inter
{
    public function get($name, $default = null);
    public function set($name, $value);
}

class Config implements Inter
{
    public function set($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function get($name, $default)
    {
        return $this->name;
    }

    public function exists()
    {

    }
}
