<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/26/13
 * Time: 1:28 AM
 * To change this template use File | Settings | File Templates.
 */

include_once '../../src/Stub/DateFormatter.php';
include_once '../../src/Stub/Config.php';

class DateFormatterTest extends PHPUnit_Framework_TestCase {

    public function testFormattingDatesBasedOnConfig()
    {
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')             //method to stub
            ->with('date.format')   //specified parameter
            ->will($this->returnValue('c')); //stub/mock the result

//        var_dump($stub->get('param'));

        $formatter = new DateFormatter($stub);

        var_dump($stub instanceof Config);
        $this->assertTrue($stub instanceof Config);

        var_dump($formatter->getFormattedDate(0));
        $this->assertEquals($formatter->getFormattedDate(0), '1970-01-01T00:00:00+00:00');

    }

    public function testFormattingDatesToReturnSelf(){
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->returnSelf());

        $this->assertSame($stub, $stub->get()); //pass
//        $this->assertSame($stub, $this->getMock("Config")); //fails because this would be a new object
    }

    public function testFormattingDatesToReturnArgument(){
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->returnArgument(2));

        $this->assertEquals($stub->get(1,2,3), 3);
    }

    public function testFormattingDatesWithArray(){ //???? not sure what the stuff here means
        $map = array(
            array(1,2,3,3),
            array('foo', 'bar', 'some', 'some')
        );
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->returnValueMap($map));

        $this->assertEquals($stub->get(1,2,3), 3);
        $this->assertEquals($stub->get('foo', 'bar', 'some'), 'some');
    }

    public function testFormattingDatesWithCallback(){
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->returnCallBack(function($arg){
                return $arg + 5;
            }));

        $this->assertEquals($stub->get(2), 7);
    }

    public function testFormattingDatesWithConsecutiveCalls(){ //testing incrementation
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->onConsecutiveCalls('foo', 'bar', 123));

        $this->assertEquals($stub->get(), 'foo');
        $this->assertEquals($stub->get(), 'bar');
        $this->assertEquals($stub->get(), '123');
    }

    /**
     * @expectedException RangeException
     */
    public function testFormattingDatesThrowsException(){
        $stub = $this->getMock("Config");
        $stub->expects($this->any())
            ->method('get')
            ->will($this->throwException(new RangeException()));

        $stub->get();
    }


    public function testFormattingDatesOverridingMethodsWithStub()
    {
        $stub = $this->getMock("Config", array('getSome')); //array contains overriding stubs
        $stub->expects($this->any())
            ->method('get')
            ->will($this->returnValue('foo'));

        var_dump($stub->get());
        // return null b/c u've created a mock which by default returns null
        // for all non mocked/stubbed methods
        var_dump($stub->getSome());
    }

    /**
     * Getting Original Methods
     */
    public function testFormattingDatesWithOriginalFunctions(){
        $stub = $this->getMock("Config", null);

        var_dump($stub->get()); //get
        var_dump($stub->getSome()); //getSome
    }

    /**
     * Defined getMock Constructor
     */
    public function testFormattingDatesWithReference(){
        $stub = $this->getMock(
            "Config2",      //mock Class Name
            null,           //overriding stubs
            array(1,2),     //third parameter is constructor
            'MyHiperClass'     //Custom Classname in place of generated random chars
//            ,false,               //whether or not to call the default constructor
//            false,                  // ?? whether or not call constructor on Clone class?? possibly $stub?
//            bool??                        // 7th and last can be used to disable autoloading behaviors
        );

        /**
         * MockBuilder, more clear what the above parameters are for when creating a mock object
         */
        $stub2 = $this->getMockBuilder('Config')
            ->disableAutoload()
            ->setMethods(array('get'))
            ->setMockClassName('Something')
            ->getMock();            //must be called at the end

        print 'getMockDefined';
//        var_dump($stub);
        var_dump($stub->getA());
        var_dump($stub->getB());
    }
}
