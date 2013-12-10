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

    function isController($controllerName){
        if(file_exists('controllers/'. $controllerName.'Controller.php')){
            return true;
        }
        else{
            return false;
        }
    }

    function Dispatch()
    {
        $controllerName = $this->command->getCommandName();
        var_dump($this->command->getCommandName());
        var_dump($this->command->getParameters());


        if ($this->isController($controllerName) == false){
            $controllerName = 'error';
        }
        include('controllers/'.$controllerName.'Controller.php');
        echo 'including file ' . $controllerName .'Controller.php . ';


        /**
         * Will Instantiate a copy of dogController() class
         */
        $controllerClass = $controllerName."Controller";
        $controller = new $controllerClass($this->command);
        $controller->execute();
    }
}

class Axial_Controller
{
    var $command;
    function Axial_Controller(&$command){
        $this->command = $command;
    }

    function _default(){

    }

    function _error(){

    }

    function execute(){
        $functionToCall = $this->command->getFunction();
        if($this->command->getFunction() == ''){
            $functionToCall = 'default';
        }
        if (!is_callable(array(&$this, '_'.$functionToCall))){
            $functionToCall = 'error';
        }
        call_user_func(array(&$this, '_'.$functionToCall));
    }
}