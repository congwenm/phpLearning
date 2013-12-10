<style>
h3{
    color: #555555;
    font-family: fantasy;
    font-weight: 200;
}

</style>

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/8/13
 * Time: 5:39 PM
 * To change this template use File | Settings | File Templates.
 * http://www.phpaddiction.com/tags/php/url-routing-with-php-part-two/
 * try with: http://localhost/php/MyWebsite/RouteUrl/part2/dogs/snacks
 */

include 'Axial_Command.php';
echo '<h1>This is Index Page</h1>';

$urlInterpreter = new Axial_UrlInterpreter();
$command = $urlInterpreter->getCommand();
$commandDispatcher = new Axial_CommandDispatcher($command);
$commandDispatcher->Dispatch();
