<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 3:07 AM
 * To change this template use File | Settings | File Templates.
 */

class IncompleteAndSkippedTest extends PHPUnit_Framework_TestCase {

    public function testSomeThingThatDontExistsNow(){
        $this->markTestIncomplete('Waiting for implementation');
    }

    public function testSomethingThatSkips(){
        $this->markTestSkipped();
    }

}
