<?php
namespace Practice2020\Config; 

interface AdapterInterface
{
    public function get($name);
    public function set($name, $value);
    public function exists($name);
    public function getData($data);
}