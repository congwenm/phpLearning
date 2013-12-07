<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/24/13
 * Time: 2:48 AM
 * To change this template use File | Settings | File Templates.
 */
function __autoload($class_name){
    include '../src/' . $class_name . ".php";
}