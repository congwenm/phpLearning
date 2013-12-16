<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/15/13
 * Time: 2:00 AM
 * To change this template use File | Settings | File Templates.
 */

class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "genhei";
    public $connection;

    public function __construct(){
        $this->dbConnect();
    }

    public function dbConnect(){
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        ) or die(mysql_error());
        if ($this->connection->connect_error){
            //echo failed;
            die('Connect Error (' .$this->connection->connect_errno .') '
                .$this->connection->connect_error);
        }
        else{
//            echo 'success';
        }
    }

    public function dbQuery($query){
        $q_result = mysqli_query($this->connection, $query);
        return $q_result;
    }

}