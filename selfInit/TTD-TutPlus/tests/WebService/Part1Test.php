<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/30/13
 * Time: 1:45 AM
 * To change this template use File | Settings | File Templates.
 */

class Part1Test extends PHPUnit_Framework_TestCase {

    public function testRotate(){
        $this->assertEquals('otavne', $this->makeRequest('rotate', 'envato'));
    }

    public function testLength(){
        $this->assertEquals(6, $this->makeRequest('length', 'envato'));
    }

    public function testNotExistingMethod(){
        $this->assertEquals('method not found', $this->makeRequest('foo', 'envato'));
    }

    protected function makeRequest($action, $param){
        $curl = curl_init();
        $url = sprintf('http://localhost:8080/Php/selfInit/TTD-TutPlus/src/WebService/part1.php?action=%s&param=%s', $action, $param);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data =curl_exec($curl);

        curl_close($curl);
        return data;
    }
}
