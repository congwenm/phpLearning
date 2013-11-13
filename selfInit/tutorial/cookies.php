<?php 
	// setcookie(name, value, expire, path, domain, security); security 1 = https 0 = http
	setcookie("name", "John Watkin", time()+3600, "/","", 0);
   	setcookie("age", "36", time()+3600, "/", "",  0);

   	// get cookie with functions
   	/* 	$_COOKIE[]
   	* 	$HTTP_COOKIE_VARS[]
   	*
   	* 	use isset() fn to check
   	*/

   	# Deleting Cookie with PHP
	# Officially, to delete a cookie you should call setcookie() with the name argument only but this does not always work well, however, and should not be relied on.
	# It is safest to set the cookie with a date that has already expired:
   	# setcookie( "name", "", time()- 60, "/","", 0);
  	# setcookie( "age", "", time()- 60, "/","", 0);

 ?>