<?php
	require '../lib/nusoap.php';
	$wsdl_address = "http://localhost:8080/WebService/Soap/service.php?wsdl";
	$client = new nusoap_client($wsdl_address); //var1 wcf file address
	// $client->call('var1', 'var2');
	// $book_name=$POST//normally
	$book_name="xyz";
	$price = $client->call('getPrice', array('name'=>"$book_name"));
	echo $price;
	// echo array('a'=>1, 'b'=>2);
?>