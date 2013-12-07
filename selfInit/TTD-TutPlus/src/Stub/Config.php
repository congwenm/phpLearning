<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/26/13
 * Time: 1:26 AM
 * To change this template use File | Settings | File Templates.
 */
class Config
{


    public function get(){
        return
//            'd-m-Y';
            'get';
    }

    public function getSome(){
        return 'getSome';
    }


}
class Config2
{
    public function __construct($a,$b){
        $this->a = $a;
        $this->b = $b;
    }
    public function getA(){
        return $this->a;
    }

    public function getB(){
        return $this->b;
    }
}