<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 2:27 AM
 * To change this template use File | Settings | File Templates.
 */

//function __autoload($class_name){
//    include '../src/' . $class_name . ".php";
//}
include_once '../src/Output.php';

class outputTest extends PHPUnit_Framework_TestCase {

    public function testOutputsHello(){
        // use output buffering, check on php.com
        $this->expectOutputString('Version is 0.0.1');
//        $this->expectOutputRegex('/Version is 0.0.1/');
//        ob_start();
        $command = new Output();
        $command->printVersion();
//        $txt = ob_get_clean();
//        var_dump($txt);
//        $this->assertEquals('Version is 0.0.1', $txt);

    }
}
