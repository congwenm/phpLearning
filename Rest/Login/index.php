<?php
session_start();
echo isset($_SESSION['login_status']);
if (isset($_SESSION['login_status']) == false){
	//redirect login
	header("Location: login.html");
}
	echo "Welcome User" . " Here is a random Key for ya " . md5(microtime().rand());

?>
<!-- <button>Logout</button> -->