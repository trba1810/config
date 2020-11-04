<?php
namespace Practice2020\Config;

interface ConfigInterface
{
    public function get($name, $default = null);
    public function set($name, $value);

    public function exists($name);
}