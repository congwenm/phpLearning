<?php
	require '../lib/nusoap.php';
	$server=new nusoap_server();

	//configure wsdl file
	$server->configureWSDL("demo", "urn:demo");

	function getPrice($name){
		$details = array('abc'=>100, 'xyz'=>200);
		foreach($details as $n=>$p){
			if($name==$n){
				$price=$p;
			}
		}
		return $price;
	}
	function addition($var1, $var2){
		return $var1 + $var2;
	}

	$server->register(
		'getPrice', //name of function
		array("name"=>'xsd:string'), //inputs, in this case array
		array("return"=>"xsd:inter") //outputs
	);
	$server->register(
		'addition', 
		array("var1"=>'xsd:string', "var2"=>'xsd:string'), 
		array("return"=>"xsd.inter")
	);

	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) 
		? $HTTP_RAW_POST_DATA : "";
	$server->service($HTTP_RAW_POST_DATA)

	
?>