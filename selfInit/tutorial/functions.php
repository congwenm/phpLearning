<?php

	function printMe($param = 1){ #defaulting a param
		echo $param;
	}
	printMe();

	# dynamic funciton calls
	$fn = "printMe";
	$fn();
?>