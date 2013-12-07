<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 3:33 AM
 * To change this template use File | Settings | File Templates.
 */

include_once '../src/FileLogger.php';
function __autoload($class_name){
    include '../src/' . $class_name . ".php";
}

class FileLoggerTest extends PHPUnit_Framework_TestCase {

    const FILENAME = './log.txt';

    protected $logger;

    public function setUp(){
        $handle = fopen('php://memory', 'a+');
//        $this->logger = new FileLogger(self::FILENAME);


    }

    public function testNoAutoloadRequired(){
        $this->assertTrue($this->logger->version == '1.0.0');
    }

    public function testCreatingLogFile(){
        $this->logger->write('Hello moto');
        $this->assertFileExists(self::FILENAME);
    }

    public function testCreatingFileOnFirstWrite(){
        $this->assertFileNotExists(self::FILENAME);
        $this->logger->write("Hello world");
        $this->assertCount(1,file('./log.txt'));
        $this->assertFileExists(self::FILENAME);
    }

    public function testAppendingToFile(){
        $this->logger->write("Hello world");
        $this->logger->write("Hello world");
        $this->logger->write("Hello world");
        $this->assertCount(3, file('./log.txt'));
    }

    public function tearDown(){
        if (file_exists(self::FILENAME)){
            unlink(self::FILENAME); //also delete files i think;
        }
        $this->logger = null;
    }

    /*
     *  Can tap into VFS files system in github.com to go further into virtual file system.
     *
     * */
}
