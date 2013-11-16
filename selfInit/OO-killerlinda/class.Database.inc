<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 11/13/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */

/**
 *  MySQli database; only one connection is allowed
 */
class Database {
    private $_connection;
    // Store the single instance at a class level.
    private static $_instance;

    /**
     * Get an instance of the Database
     * @return Database
     */
    public static function getInstance(){
        if (!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     */
    public function __construct(){
        $this->_connection = new mysqli('localhost', 'root', '', 'test');
        // Error handling.
        if(mysqli_connect_error()){
            trigger_error('Failed to connect to MYSQL: ' . mysqli_connect_error(), E_USER_ERROR);

        }
    }

    /**
     * Empty clone magic method to prevent duplication
     */
    private function __clone(){}

    /**
     * Get the mysqli connection.
     */
    public function getConnection(){
        return $this->_connection;
    }

}