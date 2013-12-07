<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/30/13
 * Time: 1:42 AM
 * To change this template use File | Settings | File Templates.
 */

$action = isset($_GET['action']) ? $_GET['action'] : null;
$param = isset($_GET['param']) ? $_GET['action'] : null;

switch($action){
    case 'rotate':
        echo strrev($param);
        break;
    case 'length':
        echo strlen($param);
        break;
    default:
        echo 'method not found';
}