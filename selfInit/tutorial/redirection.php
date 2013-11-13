<?php
	// header() is used to redirect to another location
	// use at the top of page to prevent any other part of the page from loading
	// exit() can be used to halt parsing of the rest of the code.

if($_POST && $_POST["location"])
{
	$location = $_POST["location"];
	header("Location: $location");
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Choose a site to visit: </p>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		<!-- <input name="location" type="radio" value="http://w3c.org"/> w3c.org
		<input name="location" type="radio" value="localhost:8080"/> localhost:8080 -->
		
		<select name="location">
			<option value="http://w3c.org">
				w3c.org
			</option>
			<option value="http://google.com">
				Google
			</option>			
		</select>



		<input type="submit"/>
		
	</form>

</body>
</html>