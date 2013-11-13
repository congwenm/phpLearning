<?php
	// getenv() gets all the environment variables

	// echo getenv();	

	
	echo getenv('HTTP_USER_AGENT');
	echo "<br>";
	$viewer = getenv("HTTP_USER_AGENT");
	$browser = "An unidentified browser";
	if (preg_match("/MSIE/i", "$viewer"))
	{
		$browser = "Internet Explorer";
	}
	else if(  preg_match( "/Netscape/i", "$viewer" ) )
	{
	  	$browser = "Netscape";
	}
	else if(  preg_match( "/Mozilla/i", "$viewer" ) )
	{
	  	$browser = "Mozilla";
	}

	$platform = "An unidentified OS!";
	if(preg_match("/Windows/i", $viewer))
	{
		$platform = "Windows!";
	}
	else if (preg_match("/Linux/i", "$viewer"))
	{
		$platform = "Linux!";
	}
	echo("you are using $browser on $platform");


/*	//loops
	echo "<br/>";
	function loopThrough($array){
		foreach($array as $i){
			if (gettype($i) == 'array'){
				loopThrough($i);
			}
			else{
				echo $i;
			}
		}
	}
	loopThrough(get_defined_vars())	;*/
?>