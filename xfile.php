<?php
require_once 'vendor/autoload.php';


$var = new \Practice2020\Config\Test();
$var1 = new \Practice2020\Config\Adapter\FileAdapter('H:\Projects\praksa2020\config\src\Adapter\jsonFile.json');

echo $var->x;

echo 'n';

// $data = $var1->getData();
// print_r($data);

echo $var1->get("db_user");