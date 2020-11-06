<?php
namespace Practice2020\Config\Adapter;

use AdapterInterface;

class FileAdapter implements AdapterInterface
{

    private $data = [];

    public function __construct($path)
    {
        // get extension od putanje
        // if php,json ili xml 
        // ako nije nista od toga greska
        // rezultat treba da bude :
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if($ext == 'json')
        {
            $this->data = $this->readJson($path);
        }
        elseif($ext == 'xml')
        {
            $this->data = $this->readXml($path);
        }
        else {
            
        }
        
    }

    private function readXml($path)
    {

    }

    private function readJson($path)
    {
        //procitati kontent fajla
        //pokusati json decode i return
    }

    public function getData($data)
    {

        return $this->json_decode($data);
    }

    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function get($name, $default)
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





