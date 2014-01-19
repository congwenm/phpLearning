<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/10/13
 * Time: 10:46 PM
 *
 * This is a summary version of the RouteUrl / part 1-3 directories
 */

class AxialController
{
    var $controllerName = '';
    var $actionName = array();

    /**
     * Old Fashioned Constructors
     */
    function AxialController($controllerName, $actionName){
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
    }

    function getControllerName(){
        return $this->controllerName;
    }

    function getActionName(){
        return $this->actionName;
    }

    function Dispatch()
    {
        $controllerName = $this->getControllerName();
        $actionName = $this->getActionName();

        /**
         * Logging
         */
//        switch ($controllerName)
//        {
//            default:
//                echo 'Next Command: <span class="beta">' . $controllerName .'</span>';
//                echo '<br/>Will Execute its Action: <span class="beta">' . $actionName .'</span>';
//                break;
//        }

        /**
         * Find the corresponding command to execute by including controller and find its action
         */
        try{
            include 'src/controllers/'. ucfirst($controllerName) .'Controller.php';
        } catch (Exception $e){
            //tobe continued
        }
        $controllerName = $controllerName.'Controller';
        $ctrl = new $controllerName;
        $action = $ctrl::$actionName();
        return $action;
    }
}

class VoidCommand{
    var $commandArray;
    /**
     * @param = [params given in url]
     * Constructor
     */
    function __construct($commandArray){
        $this->commandArray = $commandArray;
    }

    /**
     * return an invalid response
     */
    function Dispatch(){
        $resp = "";
        $invalidMethodMsg = (object)array(
            'InvalidCommand' => (object)array(
                'Message' => 'We do not understand the action you are looking for.',
                'Status' => '2',
                'Command' => $this->commandArray
            )
        );
        $resp = json_encode($invalidMethodMsg);
        return $resp;
    }
}


class AxialUrlInterpreter{
    /**
     * Old Fashioned Constructors
     */
    function AxialUrlInterpreter(){
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        $scriptName = explode('/', $_SERVER['SCRIPT_NAME']);

        /**
         * Deduct Script Pathname from Request Url, to get the url of the command
         *  @example
         *      $requestURI = localhost/do/this
         *      $scriptName = localhost/index.php
         *      return [do, this]
         */
        for ($i = 0; $i < sizeof($scriptName); $i ++){
            if (strtolower($requestURI[$i]) == strtolower($scriptName[$i])){
                unset($requestURI[$i]);
            }
        }
        $commandArray = array_values($requestURI);
        if (sizeof($commandArray) > 1){
            $controllerName = $commandArray[0];
            $actionName = $commandArray[1];
            $this->command = new AxialController($controllerName, $actionName);
        }
        else{
            /* Construct Invalid Method Response */
            $this->command = new VoidCommand($commandArray);
        }
//        $parameters = array_slice($commandArray, 1);
    }

    function getCommand(){
        return $this->command;
    }
}

class AxialDispatcher
{
    var $command;
    function AxialDispatcher($command)
    {
        $this->command = $command;
    }

}