<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 3:13 AM
 * To change this template use File | Settings | File Templates.
 */

class FixturesTest extends PHPUnit_Framework_TestCase {

    protected $data;
    protected static $dbh;

    /**
     * more function: onNotSuccessfulTest(Exception e), assertPreConditions();, assertPostConditions()
     * Phpunit run before class, after the class once
     */
    public static function setUpBeforeClass(){
        echo 'once at the beginning.\r';
        //used for database testing
        self::$dbh = new PDO("sqlite:memory");
    }
    public static function tearDownAfterClass(){
        echo '\r once at the end';
    }


    /**
     * Phpunit
     */
    public function setUp(){
        echo 'Hello'; //called 3 times
        $this->data = array(1,2,3);
    }

    public function testPushingToArray()
    {
//        $this->data = array(1,2,3);
        array_push($this->data, 5);
        $this->assertCount(4,$this->data);
        $this->assertContains(1,$this->data);
        $this->assertContains(2,$this->data);
        $this->assertContains(3,$this->data);
        $this->assertContains(5,$this->data);
    }

    public function testPopFromArray()
    {
//        $this->data = array(1,2,3);
        array_pop($this->data);
        $this->assertCount(2, $this->data);
        $this->assertContains(1, $this->data);
        $this->assertContains(2,$this->data);
        $this->assertNotContains(3, $this->data);
    }

    public function testShiftFromArray(){
//        $this->data = array(1,2,3);
        array_shift($this->data);
        $this->assertCount(2, $this->data);
        $this->assertContains(2, $this->data);
        $this->assertContains(3,$this->data);
        $this->assertNotContains(1, $this->data);
    }

    /**
     * Used for resetting state, e.g. setting $data = null;
     * Phpunit
     */
    public function tearDown(){
        echo 'End.';
        self::$dbh = null;
    }
}
