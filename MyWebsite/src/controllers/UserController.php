<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Congwen
 * Date: 12/10/13
 * Time: 11:49 PM
 * To change this template use File | Settings | File Templates.
 */

include_once 'src/Database.php';
final class UserController{

    /**
     * To Use, UserController::login();
     */
    const FAILURE_DATABASE_CONNECTION = 0001;
    const SUCCESS = 1111;
    const FAILURE_MORE_THAN_ONE_RESULT = 1010;
    const FAILURE_NO_RESULT = 0010;


    public static function login(){
//        return 'Login!';
        $status = 'unknown';


        $username = $_GET['username'];
        $password = $_GET['user_password'];

        $db = new Database();
        $query ="select * from users
            where username = '$username'
            and password = '$password'";
        $query_result = $db->dbQuery($query);

        if ($db->connection || mysqli_num_rows($query_result) == 0){
            $status = self::FAILURE_DATABASE_CONNECTION;
        }
//        echo 'query_result'. $query_result;
        $rows = mysqli_num_rows($query_result);
        if($rows == 1){
            //correct
            $status = self::SUCCESS;
//            echo '<p>1 result</p>';
        }
        else if ($rows > 1){
            //more than one user wth same password???
            $status = self::FAILURE_MORE_THAN_ONE_RESULT;
//            echo '<p>more than 1 result</p>';
        }
        else{
            //no user found
            $status = self::FAILURE_NO_RESULT;
//            echo '<p>no result</p>';
        }

        $result = mysqli_fetch_array($query_result);
        $message = null;
        $methodStatus = null;
        $loginData = '';
        switch ($status){
            case self::SUCCESS:
                $message = "You have successfully logged in.";
                $methodStatus = '0';
                $loginData = (object)array(
                    "firstName" => $result['first_name'],
                    "lastName" => $result['last_name'],
                    "userName" => $result['username']
                );
                break;
            case self::FAILURE_NO_RESULT:
                $message = "Please check your username and password";
                $methodStatus = '1';
                break;
            case self::FAILURE_MORE_THAN_ONE_RESULT:
                $message = "There seem to be more than one of you";
                $methodStatus = '1';
                break;
            case self::FAILURE_DATABASE_CONNECTION:
                $message = "Database Server is down";
                $methodStatus = '1';
                break;
            default:
                $message = "We do not understand what you are trying to do";
                $methodStatus = '1';
                break;
        }

        $LoginResponse = (object)array(
            "LoginResponse" => (object)array(
                "message" => $message,
                "methodStatus" => $methodStatus,
                "LoginData" => $loginData
            )
        );
        return json_encode($LoginResponse);
    }
}