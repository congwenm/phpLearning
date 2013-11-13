<?php
	
	echo 'hello world';

	$array1 = array(
		'name' => 'Congwen',
		'role' => 'father',
		'occupation' => 'Software Engineer'
	);
	$array2 = array(
		'name' => 'Yan Fei',
		'role' => 'Mother',
		'occupation' => 'Student'
	);
	$array3 = array(
		'name' => 'Wangzai',
		'role' => 'dog',
		'occupation' => 'Trouble Maker'
	);
	$family = array(
		(object)($array1),
		(object)($array2),
		(object)($array3)
	);
	print_r($family);	
	echo "<br>";

	$varDump = var_dump($family);
	print_r($varDump);
	$jsonEncode = json_encode($family );

	print_r($jsonEncode);
	// echo $jsonEncode;



?>