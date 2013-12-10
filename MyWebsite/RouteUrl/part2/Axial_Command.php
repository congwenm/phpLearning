<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/8/13
 * Time: 6:13 PM
 * To change this template use File | Settings | File Templates.
 */

class Axial_Command
{
    var $commandName = '';
    var $parameters = array();

    /**
     * Old Fashioned Constructors
     */
    function Axial_Command($commandName, $parameters){
        $this->commandName = $commandName;
        $this->parameters = $parameters;
    }

    function getCommandName(){
        return $this->commandName;
    }

    function getParameters(){
        return $this->parameters;
    }
}

class Axial_UrlInterpreter{
    /**
     * Old Fashioned Constructors
     */
    function Axial_UrlInterpreter(){
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);
        for ($i = 0; $i < sizeof($scriptName); $i ++){
            if (strtolower($requestURI[$i]) == strtolower($scriptName[$i])){
                unset($requestURI[$i]);
            }
        }
        $commandArray = array_values($requestURI);
        $commandName = $commandArray[0];
        $parameters = array_slice($commandArray, 1);
        $this->command = new Axial_Command($commandArray[0], $parameters);
    }

    function getCommand(){
        return $this->command;
    }
}


class Axial_CommandDispatcher
{
    var $command;
    function Axial_CommandDispatcher($command)
    {
        $this->command = $command;
    }

    function Dispatch()
    {
        switch ($this->command->getCommandName())
        {
            case 'dogs' :
//                include('commandone.php');
                echo '<h3>WOOF</h3>';
                break;
            case 'cats' :
                echo '<h3>MEOW</h3>';
//                include('commandtwo.php');
                break;
            case '':
                echo '<h3>NOTHING HERE</h3>';
//                include('root.php');
                break;
            default:
//                include('default.php');
                break;
        }
    }
}