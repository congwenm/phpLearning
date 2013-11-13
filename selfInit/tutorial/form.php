<?php
	if ($_POST && ($_POST["name"] || $_POST["age"])){
		echo "Welcome ".$_POST['name']."<br/>";
		echo "You are ".$_POST['age']." years old.";
		exit();
	}
?>

<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		Name: <input type="text" name="name"/>
		Age: <input type="text" name="age"/>
		<input type="submit"/>
	</form>
</body>
</html>