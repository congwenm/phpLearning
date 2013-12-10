<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/8/13
 * Time: 5:45 PM
 * To change this template use File | Settings | File Templates.
 */

$requestURI = explode('/', $_SERVER['REQUEST_URI']);
var_dump($requestURI);

/**
 * To filter out the path to the front controller we will need to use the $_SERVER['SCRIPT_NAME'] variable.
 */
$scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
var_dump($scriptName);
for ($i = 0; $i < sizeof($scriptName); $i ++){
    if (strtolower($requestURI[$i]) == strtolower($scriptName[$i])){
//        echo $requestURI[$i] . ' match!<br/>';
        unset($requestURI[$i]);
    }
}
$command = array_values($requestURI);
var_dump($command);


/**
 * Dispatching the Command
 */
switch($command[0]){
    case 'dogs':
        echo '<h3>woof</h3>';
        break;
    case 'cats':
        echo '<h3>meow</h3>';
        break;
    default:
        echo '<h3>Command Does not exist</h3>';
        break;
}



//var_dump($_SERVER);
