<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/21/13
 * Time: 5:55 PM
 * To change this template use File | Settings | File Templates.
 */

class AssertionsTest extends PHPUnit_Framework_TestCase {
    public function testBasicAssertion(){
        $this->assertTrue(1+6 === 7, 'It should be 7');
    }

    public function testInstance(){
//        $this->assertTrue(new DateTime() instanceof DatePeriod); //use instace of assertion, else not meaningful
        $this->assertInstanceOf('DateTime', new DateTime());
        $this->assertNotInstanceOf('DateTimeZone', new DateTime());
    }

    public function testArray(){
        $arr = array();
        $this->assertCount(0, $arr);
        $arr[] = 2;
        $this->assertCount(1, $arr);
        $this->assertContains(2, $arr);

        $arr[] = 12;
        $arr[] = 65;
        $this->assertCount(3, $arr);
        $this->assertArrayHasKey(1, $arr);
        $this->assertContains(12, $arr);
        $this->assertContains(65, $arr);
        $this->assertNotContains(100, $arr);

        array_pop($arr);
        $this->assertEquals(array(2,12), $arr);

        $this->assertCount(2, $arr);
        $this->assertContains(2, $arr);
        $this->assertContains(12, $arr);
        $this->assertNotContains(65, $arr);
    }

    public function testException(){
        try{
            throw new LogicException('Foo', 1234);
//            $this->fail('We should not be here');
        }
        catch (LogicException $e){
            $this->assertEquals($e->getMessage(), 'Foo');
            $this->assertEquals($e->getCode(), 1234);
        }
    }

    /**
     * @expectedException                LogicException
     * @expectedExceptionMessage        Foo
     * @expectedExceptionCode           1234
     */
    public function testExceptionSpecialNotation(){
        throw new LogicException('Foo', 1234);
    }



}
