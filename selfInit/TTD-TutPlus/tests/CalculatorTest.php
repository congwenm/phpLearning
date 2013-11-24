<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/21/13
 * Time: 5:39 PM
 * To change this template use File | Settings | File Templates.
 */


include '../Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase
{
    public function testAdd(){
        $calc = new Calculator();
        $this->assertTrue($calc->add(1,2) == 3);
    }

}