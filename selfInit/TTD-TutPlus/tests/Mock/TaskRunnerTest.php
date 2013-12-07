<?php


/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/25/13
 * Time: 2:38 AM
 * To change this template use File | Settings | File Templates.
 */

/**
 * Define Autoload Files
 * @param $class_name
 */
//function __autoload($class_name){
//    include '../src/' . $class_name . ".php";
//}

require_once '../src/TaskRunner.php';
//require_once '../TaskInterface.php';

class TaskRunnerTest extends PHPUnit_Framework_TestCase {

    public function testRunAllPassesParamsCorrectly()
    {
//        Mock class, array(method)
        $mock = $this->getMock('TaskInterface', array('execute'));

//        $mock->expects($this->once())
//            ->method('execute'); //expect to be called once

        $mock->expects($this->exactly(2))
            ->method('execute') //expect to be called exactly number of times
            ->with(
                $this->equalTo(array('foo')), //make sure that execute($option) where $option = 'foo'
                $this->greaterThanOrEqual(0)
            );


        $runner = new TaskRunner();
        $runner->registerTask($mock);
        $runner->registerTask($mock);
        $runner->runAll(array('foo')); //calling the method

    }
}
