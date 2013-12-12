<style type="text/css">
    .beta{
        font-weight: 600;
        color: #666666;
        font-size: 1.5em;
        margin: 0 10px;
    }
</style>


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
$interpreter = new AxialUrlInterpreter();
$command = $interpreter->getCommand();
//$dispatcher = new AxialDispatcher($command);
//$dispatcher->Dispatch();
$command->Dispatch();
