<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/23/13
 * Time: 4:26 AM
 * To change this template use File | Settings | File Templates.
 */

class IssuesTest extends PHPUnit_Framework_TestCase {

    /**
     * Does not work here.
     * @expectedException PHPUnit_Framework_Error
     */
//    public function testError()
//    {
//        new SomeClassThatDontExistsInThatContext;
//    }

    /**
     * PHPUnit_Framework_Error is also fine, more general
     * @expectedException PHPUnit_Framework_Error_Warning
     */
    public function testWarning()
    {
        include 'some.file.which.dont.exist';
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Notice
     */
    public function testNotice()
    {
        $_GET[THAT_CONSTANT_IS_NOT_DEFINED];
    }

}
