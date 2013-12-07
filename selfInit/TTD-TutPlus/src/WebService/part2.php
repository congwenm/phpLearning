<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/30/13
 * Time: 1:42 AM
 * To change this template use File | Settings | File Templates.
 */

require_once 'Webservice.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;
$param = isset($_GET['param']) ? $_GET['action'] : null;

$ws = new Webservice();
$ws -> $action($param);
