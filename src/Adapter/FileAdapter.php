<?php
namespace Practice2020\Config\Adapter;

// use AdapterInterface;
// Jel sme i kako ako sme da koristim interface koji je u razlicitom fajlu od klase??

class FileAdapter implements AdapterInterface
{
    private $data = [];

    public function __construct($path)
    {
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        switch($ext)
        {
            case "json":
                $this->data = $this->readJson($path);
            break;
            case "xml":
                $this->data = $this->readXml($path);
            break;
            case "php":
                $this->data = include $file_path;
            break;
            default:
                throw new Exception('wrong extension');
        } 
    }

    private function readXml($path)
    {
        $file = file_get_contents($path, true);
        $new = simplexml_load_string($file); 
        $con = json_encode($new); 
        $newArr = json_decode($con, true);
    }

    private function readJson($path)
    {
        $file = file_get_contents($path, true);
        return json_decode($file, JSON_OBJECT_AS_ARRAY);

    }

    public function getData()
    {
        return $this->data;
    }

    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function get($name, $default = null)
    {
        if($this->exists($name)){
            return $this->data[$name];
        }
        return $default; 
    }

    public function exists($name)
    {
        return array_key_exists($name, $this->data);
    }
}





