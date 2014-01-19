<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/10/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

include 'RouteUrl/Router.php';
//echo '<h1>This is the Index Page of My Website</h1><br/>';
header('Content-Type: application/json');
$interpreter = new AxialUrlInterpreter();
$command = $interpreter->getCommand();
//$dispatcher = new AxialDispatcher($command);
//$dispatcher->Dispatch();
echo $command->Dispatch();
