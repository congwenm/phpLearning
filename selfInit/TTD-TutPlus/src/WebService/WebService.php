<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/30/13
 * Time: 1:41 AM
 * To change this template use File | Settings | File Templates.
 */

class Webservice{

    public function rotate($param){
        return strrev($param);
    }

    public function length($param){
        return strlen($param);
    }

    public function __call($methodName, $params){
        return 'method not found';
    }
}