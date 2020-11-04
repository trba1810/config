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
        // $this->data[$name] = $value;
        $this->adapter->set($name, $value);
    }

    public function get($name, $default)
    {
        /* if($this->exists($name)){
            return $this->data[$name];
        }
        return $default; */

        return $this->adapter->get($name, $default);
    }

    public function exists($name)
    {
        // return array_key_exists($name, $this->data);

        return $this->adapter->exists($name);
    }
}
