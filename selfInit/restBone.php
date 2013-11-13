<?php
class RestFul{
	public $host = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "genhei";
	public $connection;

	public function __construct(){

	}
	public function dbConnect(){
		$this->connection = new mysqli(
			$this->host, 
			$this->username, 
			$this->password, 
			$this->database
		) or die(mysql_error());
		if ($this->connection->connect_error){
			echo 'failed';
			die('Connect Error (' .$this->connection->connect_errno .') '
				.$this->connection->connect_error);
		}
		else{
			echo 'success';
			echo '<br> '.$this->username.' has successfully 
			logged into '.$this->host.' with '.$this->password.
			' and is working on '.$this->database;
		}
	}
	public function login(){
		$loginQuery = "select * from users
			where username = 'demo'"
			// and passord="demo123"
			;
		$q_result = $this->dbQuery($loginQuery);
		$rows = mysqli_num_rows($q_result);
		echo '<br/>';
		if ($rows == 1){
			echo 'there is only one row, successfully queried!';
		}
		else if ($rows > 1){
			echo 'more than one row? success?!';
		}
		else{
			echo 'wrong query';
		}
		echo '<br>';
		// Displaying Results -----------------
		while($result = mysqli_fetch_array($q_result)){
			echo $result['Id'] . '. ' . $result['username'] 
			. ' contains password: ' . $result['password'];
		}
	}
	public function dbQuery($query){
		$q_result = mysqli_query($this->connection, $query);
/*		if ($q_result){
			printf($q_result);
		}else{
			printf('failed');
		}*/
		return $q_result;
	}
}

$myRest = new RestFul();
$myRest->dbConnect();
$myRest->login();

?>