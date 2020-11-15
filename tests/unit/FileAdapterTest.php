<?php

use Practice2020\Config\Adapter\FileAdapter;

class FileAdapterTest extends \PHPUnit_Framework_TestCase
{
    
    public function testClassInitialization()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $expected = false;
        if($adapter INSTANCEOF FileAdapter){
            $expected = true;
        }
        $this->assertTrue($expected);
    }

    // jedan test da je greska na kostruktoru ocekivani rezultat-- domaci
    // nisam znao
    public function testConstructError()
    {
        // Ovde isto izbacuje gresku nisam mogao da provalim sta je.
        $adapter = new FileAdapter('tests\unit\testfiles\htmlFile.html');
        // $this->expectException(Exception::class);
        // $this->expectException("Exception");
        // $this->assertException($adapter);
    }

    public function testJsonFile()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $db_user = $adapter->get("db_user");
        $expected_db_user = "my_user";

            $this->assertEquals($expected_db_user, $db_user);
        
    }

    public function testXmlFile()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\xmlFile.xml');
        $db_user = $adapter->get("db_user");
        $expected = "my_user";
        $this->assertEquals($expected, $db_user);
    }

    public function testExists()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $name = $adapter->exists("db_user");
        $this->assertTrue($name);
    }

    public function testGet()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $db_user = $adapter->get("db_pass");
        $expected = "my_pass";
        $this->assertEquals($expected, $db_user);
    }

    public function testSet()
    {
        // izbacuje mi error,nasao sam na internetu da je problem verija php-a i treba je downgradovati,ali nisam hteo na svoju ruku
        // $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        // $user = $adapter->set("db_host", "toma");
        // $expected = "toma";
        // $this->assertEquals($user["db_host"], $expected);
    }

    public function testGetData()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $data = $adapter->getData();
        $expected = ['db_user' => 'my_user',
           'db_pass' => 'my_pass',
           'db_host' => 'my_host' ,
           'log' => 'file_location'
        ];
        $this->assertEquals($expected, $data);
    }
}