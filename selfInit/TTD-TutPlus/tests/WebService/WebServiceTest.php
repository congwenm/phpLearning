<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/30/13
 * Time: 1:45 AM
 * To change this template use File | Settings | File Templates.
 */

require_once __DIR__ . '/../../src/WebService/Webservice.php';

class Part1Test extends PHPUnit_Framework_TestCase {

    protected $ws;

    public function setUp(){
        $this->ws = new Webservice();
    }

    public function testRotate(){
        $this->assertEquals('otavne', $this->ws->rotate('envato'));
    }

    public function testLength(){
        $this->assertEquals(6, $this->ws->length('envato'));
    }

    public function testNotExistingMethod(){
        $this->assertEquals('method not found', $this->ws->foo('envato'));
        $this->assertEquals('method not found', $this->ws->some('envato'));
        $this->assertEquals('method not found', $this->ws->bar('envato'));
    }


}
