<?php
session_start();
	$con = new mysqli("localhost", "root", "", "genhei"); //or die(mysql_error());
	if ($con->connect_error){
		echo 'failed';
		die('Connect Error (' .$con->connect_errno .') '.$con->connect_error);
	}

	if (isset($_POST['username']) ){
		$username = mysql_real_escape_string($_POST['username']);
		$password = md5($_POST['password']);
		echo $username . ' ';// . $password . '<br/>';

		$query = "select id from users 
		where username='$username' 
		and password ='$password' ";

		$q_result = mysqli_query($con, $query);
		$rows = mysqli_num_rows($q_result);
		if ($rows == 1){
			//password is correct
			// echo "Logged in ";
			header("Location: index.php"); // redirect
			$_SESSION['login_status'] = true;
		} else {
			echo "Wrong Password or Username";
		}
	}

	

?>