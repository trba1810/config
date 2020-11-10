<?php
namespace Practice2020\Config;

use Adapter\AdapterInterface;

class Config implements ConfigInterface
{

    private $data = [];
    private $adapter = null;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function set($name, $value)
    {
        $this->adapter->set($name, $value);
    }

    public function get($name, $default)
    {
        return $this->adapter->get($name, $default);
    }

    public function exists($name)
    {
        return $this->adapter->exists($name);
    }
}
