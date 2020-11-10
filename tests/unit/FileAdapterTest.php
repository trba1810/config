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

    public function testJsonFile()
    {
        $adapter = new FileAdapter('tests\unit\testfiles\jsonFile.json');
        $db_user = $adapter->get("db_user");
        $expected_db_user = "my_user";

            $this->assertEquals($expected_db_user, $db_user);
        
    }

    //proveriti dal radi xml, i ostale metode
}